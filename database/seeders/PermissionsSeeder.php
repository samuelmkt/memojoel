<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\Professeur;
use App\Models\Student;
use App\Models\Classe;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        DB::table('role_has_permissions')->delete();
        DB::table('model_has_roles')->delete();
        DB::table('model_has_permissions')->delete();
        DB::table('roles')->delete();
        DB::table('users')->delete();
        DB::table('permissions')->delete();
        
        $permissions = [
            // notes files model permissions
            [
                'name'      => 'notes create',
                'guard_name'=> 'web'
            ],
            [
                'name'      => 'notes show',
                'guard_name'=> 'web'
            ],
            [
                'name'      => 'notes update',
                'guard_name'=> 'web'
            ],
            [
                'name'      => 'notes delete',
                'guard_name'=> 'web'
            ],
            [
                'name'      => 'notes archive',
                'guard_name'=> 'web'
            ],
            // tps files model permissions
            [
                'name'      => 'tps create',
                'guard_name'=> 'web'
            ],
            [
                'name'      => 'tps show',
                'guard_name'=> 'web'
            ],
            [
                'name'      => 'tps update',
                'guard_name'=> 'web'
            ],
            [
                'name'      => 'tps delete',
                'guard_name'=> 'web'
            ],
            [
                'name'      => 'tps archive',
                'guard_name'=> 'web'
            ],
            // professeur model permissions
            [
                'name'      => 'professeur create',
                'guard_name'=> 'web'
            ],
            [
                'name'      => 'professeur show',
                'guard_name'=> 'web'
            ],
            [
                'name'      => 'professeur update',
                'guard_name'=> 'web'
            ],
            [
                'name'      => 'professeur delete',
                'guard_name'=> 'web'
            ],
            // students model permissions
            [
                'name'      => 'students create',
                'guard_name'=> 'web'
            ],
            [
                'name'      => 'students show',
                'guard_name'=> 'web'
            ],
            [
                'name'      => 'students update',
                'guard_name'=> 'web'
            ],
            [
                'name'      => 'students delete',
                'guard_name'=> 'web'
            ],
            // claims model permissions
            [
                'name'      => 'claims create',
                'guard_name'=> 'web'
            ],
            [
                'name'      => 'claims show',
                'guard_name'=> 'web'
            ],
            [
                'name'      => 'claims update',
                'guard_name'=> 'web'
            ],
            [
                'name'      => 'claims delete',
                'guard_name'=> 'web'
            ]
        ];

        $roles = [
            [
                'name'       => 'Super Admin',
                'guard_name' => 'web',
                'permissions'=> []
            ],
            [
                'name'       => 'Teacher',
                'guard_name' => 'web',
                'permissions'=> ['notes show', 'notes update', 'tps create', 'tps show', 'tps update', 'tps delete']
            ],
            [
                'name'       => 'Students',
                'guard_name' => 'web',
                'permissions'=> ['notes show', 'tps show', 'claims create', 'claims update']
            ],
        ];

        collect($permissions)->map(function ($permission) {
            Permission::create($permission);
        });

        collect($roles)->map(function ($role) {
            $profile = Role::create(collect($role)->except(['permissions'])->all());
            foreach ($role['permissions'] as $permission) {
                $profile->givePermissionTo($permission);
            }
        });

        $user = \App\Models\User::factory()->create([
            'name'    => 'Super Admin',
            'email'   => 'test@admin.uac.io',
            'password'=> Hash::make('M:<i|-3w):J[$')
        ]);
        $user->assignRole('Super Admin');
        
        $user = \App\Models\User::factory()->create([
            'name'    => 'Test Teacher',
            'email'   => 'test@prof.uac.io',
            'password'=> Hash::make('M:<i|-3w):J[$')
        ]);
        
        $professeur = new Professeur;
        $user->assignRole('Teacher');
        $user->professeur()->save($professeur);
        
        $user = \App\Models\User::factory()->create([
            'name'    => 'Test Student',
            'email'   => 'test@student.uac.io',
            'password'=> Hash::make('M:<i|-3w):J[$')
        ]);
        
        $student = new Student(['matricule' => '0000000']);
            $classe = Classe::find(1);

            $user->student()->save($student);
            $user->assignRole('Students');

            $classe->students()->save($student);

    }
}
