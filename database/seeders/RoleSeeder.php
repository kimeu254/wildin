<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'name' => 'SuperAdmin',
            'slug' => 'super-admin',
            'status' => 'Active',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('roles')->insert([
            'name' => 'Admin',
            'slug' => 'admin',
            'status' => 'Active',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('roles')->insert([
            'name' => 'User',
            'slug' => 'user',
            'status' => 'Active',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
