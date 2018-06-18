<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = [
//            [
//                'name' => 'create',
//                'display_name' => 'Create Record',
//                'description' => 'Allow user to create a new DB record'
//            ],
//            [
//                'name' => 'edit',
//                'display_name' => 'Edit Record',
//                'description' => 'Allow user to edit an existing DB record'
//            ],
//            [
//                'name' => 'delete',
//                'display_name' => 'Delete Record',
//                'description' => 'Allow user to delete an existing DB record'
//            ],
//            [
//                'name' => 'users',
//                'display_name' => 'Manage Users',
//                'description' => 'Allow user to manage system users'
//            ],
                [
                'name' => 'article',
                'display_name' => 'Manage Articles',
                'description' => 'User can perform actions with Articles combined with other permissions'
            ],[
                'name' => 'caffe',
                'display_name' => 'Manage caffes',
                'description' => 'User can perform actions with Caffes combined with other permissions'
            ],[
                'name' => 'table',
                'display_name' => 'Manage tables',
                'description' => 'User can perform actions with Tables combined with other permissions'
            ],[
                'name' => 'view',
                'display_name' => 'Certain View',
                'description' => 'Permission combined with other permissions'
            ],
        ];

        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }
    }
}
