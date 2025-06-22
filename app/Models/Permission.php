<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'guard_name',
        'display_name',
        'description',
        'module',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get all roles that have this permission.
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions');
    }

    /**
     * Get all users that have this permission directly.
     */
    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'model', 'model_has_permissions');
    }

    /**
     * Find a permission by name.
     */
    public static function findByName(string $name, string $guardName = 'web'): ?Permission
    {
        return static::where('name', $name)
            ->where('guard_name', $guardName)
            ->first();
    }

    /**
     * Create a permission if it doesn't exist.
     */
    public static function findOrCreate(string $name, string $guardName = 'web', array $attributes = []): Permission
    {
        $permission = static::findByName($name, $guardName);

        if (!$permission) {
            $permission = static::create(array_merge([
                'name' => $name,
                'guard_name' => $guardName,
            ], $attributes));
        }

        return $permission;
    }
} 