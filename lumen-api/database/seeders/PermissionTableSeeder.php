<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            [
                "name"       => "create-user",
                "guard_name" => "api",
            ],
            [
                "name"       => "edit-user",
                "guard_name" => "api",
            ],
            [
                "name"       => "delete-user",
                "guard_name" => "api",
            ],
            [
                "name"       => "create-role",
                "guard_name" => "api",
            ],
            [
                "name"       => "edit-role",
                "guard_name" => "api",
            ],
            [
                "name"       => "delete-role",
                "guard_name" => "api",
            ],
            [
                "name"       => "create-container",
                "guard_name" => "api",
            ],
            [
                "name"       => "edit-container",
                "guard_name" => "api",
            ],
            [
                "name"       => "delete-container",
                "guard_name" => "api",
            ],
            [
                "name"       => "create-shipping",
                "guard_name" => "api",
            ],
            [
                "name"       => "edit-shipping",
                "guard_name" => "api",
            ],
            [
                "name"       => "delete-shipping",
                "guard_name" => "api",
            ],
            [
                "name"       => "give-permission",
                "guard_name" => "api",
            ],
            [
                "name"       => "revoke-permission",
                "guard_name" => "api",
            ],
            [
                "name"       => "give-role",
                "guard_name" => "api",
            ],
            [
                "name"       => "revoke-role",
                "guard_name" => "api",
            ],
        ]);
    }
}
