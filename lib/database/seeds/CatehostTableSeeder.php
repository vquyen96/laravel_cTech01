<?php

use Illuminate\Database\Seeder;

class CatehostTableSeeder extends Seeder
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
    			'name'=>'Phổ Thông',
    			'slug'=>str_slug('Phổ Thông')
    		],
    		[
    			'name'=>'Chất Lượng Cao',
    			'slug'=>str_slug('Chất Lượng Cao')
    		]
    	];
        DB::table('catehosting')->insert($data);
    }
}
