<?php

use Illuminate\Database\Seeder;

class CateServerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
    		[
    			'name'=>'Email Sever Chuyên Nghiệp',
    			'slug'=>str_slug('Email Sever Chuyên Nghiệp')
    		],
    		[
    			'name'=>'Email Sever Riêng',
    			'slug'=>str_slug('Email Sever Riêng')
    		]
    	];
        DB::table('cateserver')->insert($data);
    }
}
