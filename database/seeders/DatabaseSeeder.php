<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\AccessControl;
use App\Models\Screen;

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
            DB::table('user_roles')->insert(
                [
                    ['type_name_en' => 'admin', 
                    'type_name_jp' => 'admin',
                    'nice_name' => 'Admin', 
                    'is_active' => true,
                    'priority' => 10,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                    ],
                    ['type_name_en' => 'manager', 
                    'type_name_jp' => 'manager',
                    'nice_name' => 'Manager', 
                    'is_active' => true,
                    'priority' => 9,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                    ],
                    ['type_name_en' => 'member', 
                    'type_name_jp' => 'member',
                    'nice_name' => 'Member', 
                    'is_active' => true,
                    'priority' => 8,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')],
                ]
            );
        }

        if(DB::table('users')->count()<=0) {
            DB::table('users')->insert(
                [
                    ['first_name' => 'Admin', 
                    'last_name' => 'Nichi',
                    'email' => 'admin@nichi.com', 
                    'phone' => "7856565656",
                    'password' => bcrypt("Admin@123"),
                    'user_role_id' => 1,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                    ],
                    ['first_name' => 'Manager', 
                    'last_name' => 'Nichi',
                    'email' => 'manager@nichi.com', 
                    'phone' => "7878787878",
                    'password' => bcrypt("manager@123"),
                    'user_role_id' => 2,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                    ],
                    ['first_name' => 'Member', 
                    'last_name' => 'Nichi',
                    'email' => 'member@nichi.com', 
                    'phone' => "9898989898",
                    'password' => bcrypt("member@123"),
                    'user_role_id' => 3,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                    ]
                ]
            );
        }

        if(DB::table('users')->count()<=0) {
            DB::table('users')->insert(
                [
                    ['first_name' => 'Admin', 
                    'last_name' => 'Nichi',
                    'email' => 'admin@nichi.com', 
                    'phone' => "7856565656",
                    'password' => bcrypt("Admin@123"),
                    'user_role_id' => 1,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                    ],
                    ['first_name' => 'Manager', 
                    'last_name' => 'Nichi',
                    'email' => 'manager@nichi.com', 
                    'phone' => "7878787878",
                    'password' => bcrypt("manager@123"),
                    'user_role_id' => 2,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                    ],
                    ['first_name' => 'Member', 
                    'last_name' => 'Nichi',
                    'email' => 'member@nichi.com', 
                    'phone' => "9898989898",
                    'password' => bcrypt("member@123"),
                    'user_role_id' => 3,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                    ]
                ]
            );
        }


        if(DB::table('user_access_tokens')->count()<=0) {
            DB::table('user_access_tokens')->insert(
                [
                    ['token' => md5('Admin'), 
                    'expired_at' => '2022-07-29',
                    'user_id' => 1, 
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                    ],
                    ['token' => md5('manager'), 
                    'expired_at' => '2022-07-29',
                    'user_id' => 2, 
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                    ],
                    ['token' => md5('member'), 
                    'expired_at' => '2022-07-29',
                    'user_id' => 3, 
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                    ]
                ]
            );
        }


        if(DB::table('screens')->count()<=0) {
            DB::table('screens')->insert(
                [
                    [
                        'screen_name_en' => 'List User', 
                        'screen_name_jp' => 'list user',
                        'screen_slug' => 'LIST_USER', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    [
                        'screen_name_en' => 'Create User', 
                        'screen_name_jp' => 'create user',
                        'screen_slug' => 'CREATE_USER', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    [
                        'screen_name_en' => 'Update User', 
                        'screen_name_jp' => 'update user',
                        'screen_slug' => 'UPDATE_USER', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    [
                        'screen_name_en' => 'Show User', 
                        'screen_name_jp' => 'show user',
                        'screen_slug' => 'SHOW_USER', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    [
                        'screen_name_en' => 'Delete User', 
                        'screen_name_jp' => 'delete user',
                        'screen_slug' => 'DELETE_USER', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],

                    [
                        'screen_name_en' => 'List ACL', 
                        'screen_name_jp' => 'list acl',
                        'screen_slug' => 'LIST_ACL', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    [
                        'screen_name_en' => 'Create ACL', 
                        'screen_name_jp' => 'create acl',
                        'screen_slug' => 'CREATE_ACL', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    [
                        'screen_name_en' => 'Update ACL', 
                        'screen_name_jp' => 'update acl',
                        'screen_slug' => 'UPDATE_ACL', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    [
                        'screen_name_en' => 'Show ACL', 
                        'screen_name_jp' => 'show acl',
                        'screen_slug' => 'SHOW_ACL', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    [
                        'screen_name_en' => 'Delete ACL', 
                        'screen_name_jp' => 'delete acl',
                        'screen_slug' => 'DELETE_ACL', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    
                    [
                        'screen_name_en' => 'List UserRole', 
                        'screen_name_jp' => 'list UserRole',
                        'screen_slug' => 'LIST_USERROLE', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    [
                        'screen_name_en' => 'Create UserRole', 
                        'screen_name_jp' => 'create UserRole',
                        'screen_slug' => 'CREATE_USERROLE', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    [
                        'screen_name_en' => 'Update UserRole', 
                        'screen_name_jp' => 'update UserRole',
                        'screen_slug' => 'UPDATE_USERROLE', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    [
                        'screen_name_en' => 'Show UserRole', 
                        'screen_name_jp' => 'show UserRole',
                        'screen_slug' => 'SHOW_USERROLE', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    [
                        'screen_name_en' => 'Delete UserRole', 
                        'screen_name_jp' => 'delete UserRole',
                        'screen_slug' => 'DELETE_USERROLE', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    
                    [
                        'screen_name_en' => 'List Screen', 
                        'screen_name_jp' => 'list Screen',
                        'screen_slug' => 'LIST_SCREEN', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    [
                        'screen_name_en' => 'Create Screen', 
                        'screen_name_jp' => 'create Screen',
                        'screen_slug' => 'CREATE_SCREEN', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    [
                        'screen_name_en' => 'Update Screen', 
                        'screen_name_jp' => 'update Screen',
                        'screen_slug' => 'UPDATE_SCREEN', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    [
                        'screen_name_en' => 'Show Screen', 
                        'screen_name_jp' => 'show Screen',
                        'screen_slug' => 'SHOW_SCREEN', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ],
                    [
                        'screen_name_en' => 'Delete Screen', 
                        'screen_name_jp' => 'delete Screen',
                        'screen_slug' => 'DELETE_SCREEN', 
                        'user_id' => "1",
                        'created_at' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d')
                    ]
                ]
            );
        }

        if(DB::table('access_controls')->count()<=0) {
            
            $screens = DB::table('screens')->get();
            $accessControlArray = [];
            
            foreach (range(1,3) as $roleId) {
                foreach($screens as $screen) 
                {
                    $data['screen_id'] =  $screen->id;
                    $data['access_type'] = AccessControl::TYPE_USER_ROLE;
                    $data['access_id'] = $roleId;
                    $data['can_access'] = ($roleId===3) ? false : true;
                    $data['created_at'] = date('Y-m-d');
                    $data['updated_at'] = date('Y-m-d');

                    array_push($accessControlArray, $data);
                }
            }
            DB::table('access_controls')->insert($accessControlArray);
        }
    }
}
