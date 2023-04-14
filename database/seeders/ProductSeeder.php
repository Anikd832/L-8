<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'username' => 'super_admin',
                'email' => 'superadmin@gmail.com',
            ],
            [
                'first_name' => 'Web',
                'last_name' => 'User',
                'username' => 'web_user',
                'email' => 'webuser@gmail.com',
            ]
        ]);
    }
}
