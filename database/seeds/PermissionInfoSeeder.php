<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permission\Models\Role;
use App\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class PermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate tables
        DB::statement("SET foreign_key_checks=0");
            DB::table('role_user')->truncate();
            DB::table('permission_role')->truncate();
            Permission::truncate();
            Role::truncate();
        DB::statement("SET foreign_key_checks=1");
        //user Admin
        $userAdmin = User::where('email', 'heraldcnp@gmail.com')->first();
        if($userAdmin){
            $userAdmin->delete();
        }
        $userAdmin = User::create([
            'name' =>  'Herald',
            'email' => 'heraldcnp@gmail.com',
            'password' => Hash::make('admin'),
        ]);

        //Role Admin

        $roleAdmin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrator',
            'full-access' => 'yes'
        ]);
        //Table role_user
        $userAdmin->roles()->sync([ $roleAdmin->id ]);

        //Permission
        $permission_all = [];

            //Permission role
            $permission = Permission::create([
                'name' => 'List Role',
                'slug' => 'role.index',
                'description' => 'A user can list role'
            ]);
            $permission_all[] = $permission->id;

            $permission = Permission::create([
                'name' => 'Show Role',
                'slug' => 'role.show',
                'description' => 'A user can see role'
            ]);
            $permission_all[] = $permission->id;

            $permission = Permission::create([
                'name' => 'Create Role',
                'slug' => 'role.create',
                'description' => 'A user can create role'
            ]);
            $permission_all[] = $permission->id;

            $permission = Permission::create([
                'name' => 'Edit Role',
                'slug' => 'role.edit',
                'description' => 'A user can edit role'
            ]);
            $permission_all[] = $permission->id;

            $permission = Permission::create([
                'name' => 'Destroy Role',
                'slug' => 'role.desroy',
                'description' => 'A user can destroy role'
            ]);
            $permission_all[] = $permission->id;


            //Permission user
            $permission = Permission::create([
                'name' => 'List User',
                'slug' => 'user.index',
                'description' => 'A user can list user'
            ]);
            $permission_all[] = $permission->id;

            $permission = Permission::create([
                'name' => 'Show User',
                'slug' => 'user.show',
                'description' => 'A user can see user'
            ]);
            $permission_all[] = $permission->id;

            $permission = Permission::create([
                'name' => 'Edit User',
                'slug' => 'user.edit',
                'description' => 'A user can edit user'
            ]);
            $permission_all[] = $permission->id;

            $permission = Permission::create([
                'name' => 'Destroy User',
                'slug' => 'user.desroy',
                'description' => 'A user can destroy user'
            ]);
            $permission_all[] = $permission->id;

            /*
                $permission = Permission::create([
                'name' => 'Create User',
                'slug' => 'user.create',
                'description' => 'A user can create user'
            ]);
            $permission_all[] = $permission->id;
            */

        //Table permission_role
        //$roleAdmin->permissions()->sync( $permission_all );
    }
}
