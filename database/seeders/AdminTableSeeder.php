<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            'name' => 'Shahid Patel',
            'email' => 'shahid.patel@gmail.com',
            'password' => bcrypt('admin@123'),
            'status' => '1',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
