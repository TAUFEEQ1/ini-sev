<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriberSeeder extends Seeder
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
            ["email"=>"example@example.com"],
            ["email"=>"johndoe@example.com"],
            ["email"=>"janedoe@example.com"]
        ];
        DB::table("subscribers")->insert($data);
    }
}
