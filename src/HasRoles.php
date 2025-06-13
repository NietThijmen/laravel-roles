<?php

namespace NietThijmen\LaravelRoles;

use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use NietThijmen\LaravelRoles\Models\Role;
use NietThijmen\LaravelRoles\Models\UserRole;

trait HasRoles
{
    public function roles(): HasManyThrough
    {
        return $this->hasManyThrough(
            Role::class,
            UserRole::class,
            'user_id',
            'id',
            'id',
            'role_id'
        );
    }

    /**
     * Check if the user has a specific role.
     */
    public function hasRole(string $role): bool
    {
        return $this->roles()->where('name', $role)->exists();
    }

    /**
     * Assign a role to the user.
     */
    public function assignRole(string $role): void
    {
        $roleModel = Role::firstOrCreate(['name' => $role]);
        $this->roles()->attach($roleModel->id);
    }

    /**
     * Remove a role from the user.
     */
    public function removeRole(string $role): void
    {
        $roleModel = Role::where('name', $role)->first();
        if ($roleModel) {
            $this->roles->detach($roleModel->id);
        }
    }
}
