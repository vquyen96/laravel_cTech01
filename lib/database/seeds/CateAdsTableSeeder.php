<?php

use Illuminate\Database\Seeder;

class CateAdsTableSeeder extends Seeder
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
    			'name'=>'Google Adwords',
    			'slug'=>str_slug('Google Adwords')
    		],
    		[
    			'name'=>'Google Display',
    			'slug'=>str_slug('Google Display')
    		]
    	];
        DB::table('cateads')->insert($data);
    }
}
