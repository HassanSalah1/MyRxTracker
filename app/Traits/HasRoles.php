<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Collection;

trait HasRoles
{
    /**
     * Get all roles for this model.
     */
    public function roles(): MorphToMany
    {
        return $this->morphToMany(Role::class, 'model', 'model_has_roles');
    }

    /**
     * Get all permissions for this model (directly assigned).
     */
    public function permissions(): MorphToMany
    {
        return $this->morphToMany(Permission::class, 'model', 'model_has_permissions');
    }

    /**
     * Check if the model has a specific role.
     */
    public function hasRole(string|Role $role): bool
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return $this->roles->contains($role);
    }

    /**
     * Check if the model has any of the given roles.
     */
    public function hasAnyRole(array $roles): bool
    {
        return collect($roles)->some(fn($role) => $this->hasRole($role));
    }

    /**
     * Check if the model has all of the given roles.
     */
    public function hasAllRoles(array $roles): bool
    {
        return collect($roles)->every(fn($role) => $this->hasRole($role));
    }

    /**
     * Check if the model has a specific permission.
     */
    public function hasPermission(string|Permission $permission): bool
    {
        $permissionName = is_string($permission) ? $permission : $permission->name;

        // Check direct permissions
        if ($this->permissions->contains('name', $permissionName)) {
            return true;
        }

        // Check permissions through roles
        return $this->hasPermissionViaRole($permissionName);
    }

    /**
     * Check if the model has permission through any of its roles.
     */
    public function hasPermissionViaRole(string $permission): bool
    {
        return $this->roles->some(function (Role $role) use ($permission) {
            return $role->hasPermission($permission);
        });
    }

    /**
     * Check if the model has any of the given permissions.
     */
    public function hasAnyPermission(array $permissions): bool
    {
        return collect($permissions)->some(fn($permission) => $this->hasPermission($permission));
    }

    /**
     * Check if the model has all of the given permissions.
     */
    public function hasAllPermissions(array $permissions): bool
    {
        return collect($permissions)->every(fn($permission) => $this->hasPermission($permission));
    }

    /**
     * Assign a role to the model.
     */
    public function assignRole(string|Role $role): self
    {
        if (is_string($role)) {
            $role = Role::findByName($role);
        }

        if ($role && !$this->hasRole($role)) {
            $this->roles()->attach($role);
        }

        return $this;
    }

    /**
     * Remove a role from the model.
     */
    public function removeRole(string|Role $role): self
    {
        if (is_string($role)) {
            $role = Role::findByName($role);
        }

        if ($role) {
            $this->roles()->detach($role);
        }

        return $this;
    }

    /**
     * Sync roles for the model.
     */
    public function syncRoles(array $roles): self
    {
        $roleIds = collect($roles)->map(function ($role) {
            if (is_string($role)) {
                return Role::findByName($role)?->id;
            }
            return $role instanceof Role ? $role->id : $role;
        })->filter();

        $this->roles()->sync($roleIds);

        return $this;
    }

    /**
     * Give permission directly to the model.
     */
    public function givePermissionTo(string|Permission $permission): self
    {
        if (is_string($permission)) {
            $permission = Permission::findByName($permission);
        }

        if ($permission && !$this->hasDirectPermission($permission->name)) {
            $this->permissions()->attach($permission);
        }

        return $this;
    }

    /**
     * Revoke permission from the model.
     */
    public function revokePermissionTo(string|Permission $permission): self
    {
        if (is_string($permission)) {
            $permission = Permission::findByName($permission);
        }

        if ($permission) {
            $this->permissions()->detach($permission);
        }

        return $this;
    }

    /**
     * Check if the model has a direct permission (not through roles).
     */
    public function hasDirectPermission(string $permission): bool
    {
        return $this->permissions->contains('name', $permission);
    }

    /**
     * Get all permissions (direct + via roles).
     */
    public function getAllPermissions(): Collection
    {
        $directPermissions = $this->permissions;
        
        $rolePermissions = $this->roles->flatMap(function (Role $role) {
            return $role->permissions;
        });

        return $directPermissions->merge($rolePermissions)->unique('id');
    }

    /**
     * Check if user can access admin panel.
     */
    public function canAccessPanel(): bool
    {
        return $this->hasAnyPermission([
            'access-admin-panel',
            'manage-users',
            'manage-doctors',
            'manage-packs'
        ]);
    }
} 