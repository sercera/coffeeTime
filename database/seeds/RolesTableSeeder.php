<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'User has access to all system functionality',
                'priority' => 1000
            ],

            [
                'name' => 'owner',
                'display_name' => 'Owner',
                'description' => 'User can create create and edit data in the system',
                'priority' => 500
            ],

            [
                'name' => 'employee',
                'display_name' => 'Employee',
                'description' => 'User can read specific data in the system',
                'priority' => 100
            ],

            [
                'name' => 'user',
                'display_name' => 'Users',
                'description' => 'User can read specific data in the system',
                'priority' => 1
            ]
        ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
