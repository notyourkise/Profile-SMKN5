<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Roles
        $adminRole = Role::create(['name' => 'Admin']);
        $redakturRole = Role::create(['name' => 'Redaktur']);
        $jurnalisRole = Role::create(['name' => 'Jurnalis']);

        // Create Permissions (optional - bisa dikembangkan)
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage berita']);
        Permission::create(['name' => 'publish berita']);
        Permission::create(['name' => 'write berita']);

        // Assign Permissions to Roles
        $adminRole->givePermissionTo(Permission::all());
        $redakturRole->givePermissionTo(['manage berita', 'publish berita']);
        $jurnalisRole->givePermissionTo(['write berita']);

        // Create Default Users
        $admin = User::create([
            'name' => 'Admin SMKN 5',
            'email' => 'admin@smkn5samarinda.sch.id',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('Admin');

        $redaktur = User::create([
            'name' => 'Redaktur Berita',
            'email' => 'redaktur@smkn5samarinda.sch.id',
            'password' => Hash::make('password'),
        ]);
        $redaktur->assignRole('Redaktur');

        $jurnalis = User::create([
            'name' => 'Jurnalis SMKN 5',
            'email' => 'jurnalis@smkn5samarinda.sch.id',
            'password' => Hash::make('password'),
        ]);
        $jurnalis->assignRole('Jurnalis');
    }
}
