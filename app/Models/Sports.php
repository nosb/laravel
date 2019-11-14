<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sports extends Model
{
    protected $primaryKey = "MID";

    protected $guarded = [];

    public $timestamps = false;

    //默认修改的是主键id 如果以别的字段为条件 则传入第二个参数$referenceColumn
    public function updateBatch(array $multipleData, string $referenceColumn = null, bool $updatedAt = true)
    {
        if (empty($multipleData)) {
            throw new \Exception('updateBatch更新数据不能为空');
        }
        $tableName = DB::getTablePrefix() . $this->getTable(); // 表名
        $firstRow  = current($multipleData);
        // 获取所有字段
        $updateColumns = array_keys($firstRow);
        // 默认以id为条件更新
        $referenceColumn = $referenceColumn ?: $this->getKeyName();
        // 剔除条件字段
        $updateColumns = array_filter($updateColumns, function($column) use($referenceColumn) {
            if ($column != $referenceColumn) return true;
        });
        // 更新时间字段
        if ($updatedAt && $this->usesTimestamps()) {
            $updatedAtColumn = $this->getUpdatedAtColumn();
            if (!in_array($updatedAtColumn, $updateColumns)) {
                array_push($updateColumns, $updatedAtColumn);
            }
        }
        // 拼接sql语句
        $updateSql = "UPDATE " . $tableName . " SET ";
        $sets      = [];
        $bindings  = [];
        foreach ($updateColumns as $uColumn) {
            if (isset($updatedAtColumn) && ($uColumn == $updatedAtColumn)) {
                $setSql = "`" . $uColumn . "` = ? ";
                $bindings[] = $this->freshTimestampString();
            } else {
                $setSql = "`" . $uColumn . "` = CASE ";
                foreach ($multipleData as $data) {
                    $setSql .= "WHEN `" . $referenceColumn . "` = ? THEN ? ";
                    $bindings[] = $data[$referenceColumn];
                    $bindings[] = $data[$uColumn];
                }

                $setSql .= "ELSE `" . $uColumn . "` END ";
            }

            $sets[] = $setSql;
        }
        $updateSql .= implode(', ', $sets);
        $whereIn   = collect($multipleData)->pluck($referenceColumn)->values()->all();
        $bindings  = array_merge($bindings, $whereIn);
        $whereIn   = rtrim(str_repeat('?,', count($whereIn)), ',');
        $updateSql = rtrim($updateSql, ", ") . " WHERE `" . $referenceColumn . "` IN (" . $whereIn . ")";
        // 传入预处理sql语句和对应绑定数据
        return DB::update($updateSql, $bindings);
    }
}
