<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'guard_name',
        'display_name',
        'description',
        'is_default',
    ];

    protected $casts = [
        'is_default' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get all permissions for this role.
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions');
    }

    /**
     * Get all users that have this role.
     */
    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'model', 'model_has_roles');
    }

    /**
     * Check if role has a permission.
     */
    public function hasPermission(string $permission): bool
    {
        return $this->permissions->contains('name', $permission);
    }

    /**
     * Give permission to the role.
     */
    public function givePermissionTo(string|Permission $permission): self
    {
        if (is_string($permission)) {
            $permission = Permission::findByName($permission);
        }

        if ($permission && !$this->hasPermission($permission->name)) {
            $this->permissions()->attach($permission);
        }

        return $this;
    }

    /**
     * Revoke permission from the role.
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
     * Sync permissions for the role.
     */
    public function syncPermissions(array|\Illuminate\Support\Collection $permissions): self
    {
        $permissionIds = collect($permissions)->map(function ($permission) {
            if (is_string($permission)) {
                return Permission::findByName($permission)?->id;
            }
            return $permission instanceof Permission ? $permission->id : $permission;
        })->filter();

        $this->permissions()->sync($permissionIds);

        return $this;
    }

    /**
     * Find a role by name.
     */
    public static function findByName(string $name, string $guardName = 'web'): ?Role
    {
        return static::where('name', $name)
            ->where('guard_name', $guardName)
            ->first();
    }

    /**
     * Create a role if it doesn't exist.
     */
    public static function findOrCreate(string $name, string $guardName = 'web', array $attributes = []): Role
    {
        $role = static::findByName($name, $guardName);

        if (!$role) {
            $role = static::create(array_merge([
                'name' => $name,
                'guard_name' => $guardName,
            ], $attributes));
        }

        return $role;
    }
} 