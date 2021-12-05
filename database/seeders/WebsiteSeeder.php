<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['host'=>'https://google.com','name'=>"google"],
            ['host'=>'https://amazon.com','name'=>"amazon"],
            ['host'=>'https://twitter.com','name'=>'twitter']
            //...
        ];
        DB::table("websites")->insert($data);
    }
}
