<?php

namespace App\Http\Controllers;

use App\Models\Sports;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Cookie\CookieJar;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class IndexController extends Controller
{
    public function index(){

       // $res = Role::create(['name' => 'writer']);
        $p = Permission::create(['name' => 'edit articles']);

        dd($p);

        $client = new Client([
            'base_uri'=>"https://www.ujiule.net",
            'cookies' => true
        ]);
        $jar = new CookieJar();
        $response = $client->request('GET', '/touzhu/FT_Browser/FT_ZC.aspx?p=1',[
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36',
                'Referer'=>'https://www.ujiule.net/touzhu/FT_Browser/FT_ZC_l.aspx'
            ],
            'cookies' => $jar
        ]);

        $body = $response->getBody()->getContents();
        $htmlData = mb_convert_encoding($body, 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');

        //总页数
        preg_match('/parent.page=(\s+\d+)/', $htmlData, $matchesPage);
        $pageTotal = trim($matchesPage[1]);

        preg_match_all("/Array\((.+?)\);/is", $htmlData, $matches);

        $data = $matches[0];

        $updateData = [];
        $insertData = [];
        foreach ($data as $k => $messages){
            $messages = str_replace(");",")",$messages);
            $messages = str_replace("&gt; ","",$messages);
            $dataInfo = eval("return $messages;");

            if (!empty($dataInfo)){
                $pos_m = stripos($dataInfo[4], 'test'); // 查找联赛名称是否含有 test
                $pos_m_tw = stripos($dataInfo[4], '測試'); // 查找联赛名称是否含有 測試
                $pos_mb = stripos($dataInfo[5], 'test'); // 检查主队名称是否含有 test
                $pos_mb_tw = stripos($dataInfo[5], '測試'); // 检查主队名称是否含有 測試
                $pos_tg = stripos($dataInfo[6], 'test'); // 检查客队名称是否含有 test
                $pos_tg_tw = stripos($dataInfo[6], '測試'); // 检查客队名称是否含有 測試
                if ($pos_m !== false || $pos_mb !== false || $pos_tg !== false || $pos_m_tw !== false || $pos_mb_tw !== false || $pos_tg_tw !== false){
                    continue;
                }

                // 時間處理
                $m_date = date('Y') . "-" . $dataInfo[2]; // 日期（2018-09-18）
                $m_time = strtolower($dataInfo[3]); // 時間（04:30a）
                $timestamp = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $dataInfo[72])) - 12 * 3600);

                $check = Sports::find($dataInfo[0]);
                $dataInfo[7] = $dataInfo[7]??0;
                if(!$check){
                    //MID,Type,M_Start,M_Date,M_Time,MB_Team,TG_Team,MB_Team_tw,TG_Team_tw,M_League,M_League_tw,MB_MID,TG_MID,M_Type,S_Show,more
                    $insertData[] = [
                        "MID" => $dataInfo[0],
                        "Type" => 'FU',
                        "M_Start" => $timestamp,
                        "M_Date" => $m_date,
                        "M_Time" => $m_time,
                        "MB_Team" => $dataInfo[5],
                        "TG_Team" => $dataInfo[6],
                        "MB_Team_tw" => $dataInfo[5],
                        "TG_Team_tw" => $dataInfo[6],
                        "M_League" => $dataInfo[4],
                        "M_League_tw" => $dataInfo[4],
                        "MB_MID" => $dataInfo[81],
                        "TG_MID" => $dataInfo[82],
                        "M_Type" => $dataInfo[7],
                        "S_Show" => 1,
                        "more" => $dataInfo[109],
                    ];
                }else{
                    $updateData[] = [
                        "MID"          => $dataInfo[0],
                        "Type"          => "FT",
                        "M_Start"       => $timestamp ,
                        "M_Date"        => $m_date,
                        "M_Time"        => $m_time,
                        "M_League"      => $dataInfo[4], // 简体中文-联赛名称
                        "M_League_tw"   => $dataInfo[4],
                        "MB_MID"        => $dataInfo[81],
                        "TG_MID"        => $dataInfo[82],
                        "MB_Team"       => $dataInfo[5], // 简体中文-主队名称
                        "TG_Team"       => $dataInfo[6], // 简体中文-客队名称
                        "MB_Team_tw"    => $dataInfo[5],
                        "TG_Team_tw"    => $dataInfo[6],
                        "ShowTypeR"     => stripos($dataInfo[12], '*') !== false ? 'C' : 'H',
                        "M_LetB"        => str_replace('*', '', $dataInfo[12]),
                        "MB_LetB_Rate"  => $dataInfo[10],
                        "TG_LetB_Rate"  => $dataInfo[11],
                        "MB_Dime"       => $dataInfo[16],
                        "TG_Dime"       => $dataInfo[16],
                        "TG_Dime_Rate"  => $dataInfo[18],
                        "MB_Dime_Rate"  => $dataInfo[17],
                        "MB_Win_Rate"   => $dataInfo[13],
                        "TG_Win_Rate"   => $dataInfo[14],
                        "M_Flat_Rate"   => $dataInfo[15],
                        "S_Single_Rate" => $dataInfo[19],
                        "S_Double_Rate" => $dataInfo[20],
                        "ShowTypeHR"    => stripos($dataInfo[28], '*') !== false ? 'C' : 'H',
                        "M_LetB_H"      => str_replace('*', '', $dataInfo[28]),
                        "MB_LetB_Rate_H"=> $dataInfo[21],
                        "TG_LetB_Rate_H"=> $dataInfo[22],
                        "MB_Dime_H"     => $dataInfo[29],
                        "TG_Dime_H"     => $dataInfo[29],
                        "TG_Dime_Rate_H"=> $dataInfo[24],
                        "MB_Dime_Rate_H"=> $dataInfo[23],
                        "MB_Win_Rate_H" => $dataInfo[25],
                        "TG_Win_Rate_H" => $dataInfo[26],
                        "M_Flat_Rate_H" => $dataInfo[27],
                        "more"          => $dataInfo[109],
                        "S_Show"        => 1,
                        "M_Type"        => $dataInfo[7]

                    ];

                }
            }else{
                continue;
            }
        }

        if(count($insertData) > 0){
            Sports::insert($insertData);
        }

        if(count($updateData) > 0){
            app(Sports::class)->updateBatch($updateData,"MID");
        }
    }


    public function test(){
        /*for($i = 0;$i< 100000;$i++){
          Redis::hset('testRedis','test'.$i,$i);
      }*/
        /*   Redis::pipeline(function ($pipe) {
               for ($i = 0; $i < 100000; $i++) {
                   $pipe->hset('testRedis','test'.$i,$i);
               }
           });*/

        /* $t1 = microtime(true);

         for($i = 0;$i < 10000; $i++){
             DB::table('test')->insert([
                 'name'=>$i.'name',
                 'age'=>$i
             ]);
         }
         $t2 = microtime(true);
         echo '<br />';
         echo $t2-$t1;*/
    }


    public function webSocket(){


    	return view('socket');
    }
}
