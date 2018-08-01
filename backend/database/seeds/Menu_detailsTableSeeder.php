<?php

use Illuminate\Database\Seeder;

class Menu_detailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_details')->insert([
        	[
        		'title' => 'BÍ QUYẾT LÀM ĐẸP',
        		'href' => 'lamdep.html',
        		'menu_id' => '3'
        	],
        	[
        		'title' => 'BÍ QUYẾT TRẮNG DA',
        		'href' => 'trangda.html',
        		'menu_id' => '3'
        	],
        	[
        		'title' => 'BÍ QUYẾT TRANG ĐIỂM',
        		'href' => 'trangdiem.html',
        		'menu_id' => '3'
        	],
        ]);
    }
}
