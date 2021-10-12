<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('user_roles')->count()<=0) {
            DB::table('user_roles')->create(
                [
                    ['type_name_en' => 'admin', 
                    'type_name_jp' => 'admin',
                    'nice_name' => 'Admin', 
                    'is_active' => true,
                    'priority' => 10],
                    ['type_name_en' => 'manager', 
                    'type_name_jp' => 'manager',
                    'nice_name' => 'Manager', 
                    'is_active' => true,
                    'priority' => 9],
                    ['type_name_en' => 'member', 
                    'type_name_jp' => 'member',
                    'nice_name' => 'Member', 
                    'is_active' => true,
                    'priority' => 8],
                ]
            );
        }

        
    }
}
