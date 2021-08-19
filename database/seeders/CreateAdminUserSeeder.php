<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'wolf',
            'email' => 'ahmedragabyasin2020@gmail.com',
            'password' => bcrypt('258258258'),
            'roles_name' => ["owner"],
            'Status' => 'مفعل',
            ]);
            $role = Role::create(['name' => 'owner']);
            $permissions = Permission::pluck('id','id')->all();
            $role->syncPermissions($permissions);
            $user->assignRole([$role->id]);
    }
}
