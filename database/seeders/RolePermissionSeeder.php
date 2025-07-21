<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            // Admin permissions
            ['name' => 'access-admin-panel', 'display_name' => 'Access Admin Panel', 'module' => 'admin'],
            ['name' => 'manage-roles', 'display_name' => 'Manage Roles', 'module' => 'admin'],
            ['name' => 'manage-permissions', 'display_name' => 'Manage Permissions', 'module' => 'admin'],
            
            // User management
            ['name' => 'view-users', 'display_name' => 'View Users', 'module' => 'users'],
            ['name' => 'create-users', 'display_name' => 'Create Users', 'module' => 'users'],
            ['name' => 'edit-users', 'display_name' => 'Edit Users', 'module' => 'users'],
            ['name' => 'delete-users', 'display_name' => 'Delete Users', 'module' => 'users'],
            ['name' => 'manage-patients', 'display_name' => 'Manage Patients', 'module' => 'users'],
            
            // Doctor management
            ['name' => 'view-doctors', 'display_name' => 'View Doctors', 'module' => 'doctors'],
            ['name' => 'create-doctors', 'display_name' => 'Create Doctors', 'module' => 'doctors'],
            ['name' => 'edit-doctors', 'display_name' => 'Edit Doctors', 'module' => 'doctors'],
            ['name' => 'delete-doctors', 'display_name' => 'Delete Doctors', 'module' => 'doctors'],
            
            // Pack management
            ['name' => 'view-packs', 'display_name' => 'View Packs', 'module' => 'packs'],
            ['name' => 'create-packs', 'display_name' => 'Create Packs', 'module' => 'packs'],
            ['name' => 'edit-packs', 'display_name' => 'Edit Packs', 'module' => 'packs'],
            ['name' => 'delete-packs', 'display_name' => 'Delete Packs', 'module' => 'packs'],
            ['name' => 'manage-starter-packs', 'display_name' => 'Manage Starter Packs', 'module' => 'packs'],
            ['name' => 'manage-ontrack-packs', 'display_name' => 'Manage OnTrack Packs', 'module' => 'packs'],
            ['name' => 'manage-redeeming-packs', 'display_name' => 'Manage Redeeming Packs', 'module' => 'packs'],
            
            // Event management
            ['name' => 'view-events', 'display_name' => 'View Events', 'module' => 'events'],
            ['name' => 'create-events', 'display_name' => 'Create Events', 'module' => 'events'],
            ['name' => 'edit-events', 'display_name' => 'Edit Events', 'module' => 'events'],
            ['name' => 'delete-events', 'display_name' => 'Delete Events', 'module' => 'events'],
            
            // Pharmacy management
            ['name' => 'view-pharmacies', 'display_name' => 'View Pharmacies', 'module' => 'pharmacies'],
            ['name' => 'create-pharmacies', 'display_name' => 'Create Pharmacies', 'module' => 'pharmacies'],
            ['name' => 'edit-pharmacies', 'display_name' => 'Edit Pharmacies', 'module' => 'pharmacies'],
            ['name' => 'delete-pharmacies', 'display_name' => 'Delete Pharmacies', 'module' => 'pharmacies'],
            
            // Page management
            ['name' => 'view-pages', 'display_name' => 'View Pages', 'module' => 'pages'],
            ['name' => 'create-pages', 'display_name' => 'Create Pages', 'module' => 'pages'],
            ['name' => 'edit-pages', 'display_name' => 'Edit Pages', 'module' => 'pages'],
            ['name' => 'delete-pages', 'display_name' => 'Delete Pages', 'module' => 'pages'],
            
            // Slider management
            ['name' => 'view-sliders', 'display_name' => 'View Sliders', 'module' => 'sliders'],
            ['name' => 'create-sliders', 'display_name' => 'Create Sliders', 'module' => 'sliders'],
            ['name' => 'edit-sliders', 'display_name' => 'Edit Sliders', 'module' => 'sliders'],
            ['name' => 'delete-sliders', 'display_name' => 'Delete Sliders', 'module' => 'sliders'],
            
             // Message management
             ['name' => 'view-messages', 'display_name' => 'View Messages', 'module' => 'messages'],
             ['name' => 'create-messages', 'display_name' => 'Create Messages', 'module' => 'messages'],
             ['name' => 'edit-messages', 'display_name' => 'Edit Messages', 'module' => 'messages'],
             ['name' => 'delete-messages', 'display_name' => 'Delete Messages', 'module' => 'messages'],
            // Dashboard
            ['name' => 'view-dashboard', 'display_name' => 'View Dashboard', 'module' => 'dashboard'],
            ['name' => 'view-charts', 'display_name' => 'View Charts', 'module' => 'dashboard'],
            ['name' => 'view-statistics', 'display_name' => 'View Statistics', 'module' => 'dashboard'],
            
            // Settings management
            ['name' => 'manage-settings', 'display_name' => 'Manage Settings', 'module' => 'admin'],
        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission['name'], 'web', $permission);
        }

        // Create roles
        $adminRole = Role::findOrCreate('admin', 'web', [
            'display_name' => 'Administrator',
            'description' => 'Full access to all features',
        ]);

        $managerRole = Role::findOrCreate('manager', 'web', [
            'display_name' => 'Manager',
            'description' => 'Limited administrative access',
        ]);

        $userRole = Role::findOrCreate('user', 'web', [
            'display_name' => 'User',
            'description' => 'Regular user with limited access',
            'is_default' => true,
        ]);

        // Assign permissions to roles
        
        // Admin gets all permissions
        $adminRole->syncPermissions(Permission::all());

        // Manager gets most permissions except role/permission management
        $managerPermissions = Permission::whereNotIn('name', [
            'manage-roles',
            'manage-permissions',
            'delete-users',
        ])->get();
        $managerRole->syncPermissions($managerPermissions);

        // User gets basic permissions
        $userPermissions = Permission::whereIn('name', [
            'view-dashboard',
        ])->get();
        $userRole->syncPermissions($userPermissions);
    }
} 