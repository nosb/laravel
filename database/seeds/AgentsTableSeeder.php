<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('agents')->insert([
            'name'=>'123'
        ],[
            'name'=>'345'
        ]);
    }
}
