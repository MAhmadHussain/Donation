<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\str;
class contactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'name'=>str::random(10),
            'email'=>str::random(10).'@gmail.com',
            'subject'=>str::random(10),
            'message'=>str::random(20)
        ]);
    }
}
