<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
        	[
        		'title' => 'TRANG CHỦ',
        		'href' => 'index.html'
        	],
        	[
        		'title' => 'GIỚI THIỆU',
        		'href' => 'gioithieu.html'
        	],
        	[
        		'title' => 'TIN TỨC LÀM ĐẸP',
        		'href' => 'tintuc.html'
        	],
        	[
        		'title' => 'HƯỚNG DẪN MUA HÀNG',
        		'href' => 'huongdan.html'
        	],
        	[
        		'title' => 'LIÊN HỆ',
        		'href' => 'lienhe.html'
        	]
        ]);
    }
}
