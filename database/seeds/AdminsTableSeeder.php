<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();
        $adminRecords = [
            [
                'id' => 1, 'name' => 'admin', 'type' => 'admin', 'mobile' => '+254704722441', 'password' => Hash::make('admin123'),

                'email' => 'admin@admin.com', 'image' => '', 'status' => 1
            ],
            [
                'id' => 2, 'name' => 'subadmin', 'type' => 'subadmin', 'mobile' => '+254704722441', 'password' => Hash::make('admin123'),

                'email' => 'subadmin@subadmin.com', 'image' => '', 'status' => 1
            ],


        ];

        DB::table('admins')->insert($adminRecords);
    }
}
