<?php

namespace App\Http\Services\Role;

use App\Models\Role;
use App\Http\Resources\Role\RoleResource;
use Exception;

class RoleService
{
    public function getAllRole(): RoleResource|string
    {
        try {

            return new RoleResource(Role::all());
        } catch (Exception $error) {
            
            return $error->getMessage();
        }
    }

    public function create(array $data): RoleResource|string
    {
        try {

            return new RoleResource(Role::create($data));
        } catch (Exception $error) {
            
            return $error->getMessage();
        }
    }

    public function update(array $data, Role $role): RoleResource|string
    {
        try {

            return new RoleResource($role->update($data));
        } catch (Exception $error) {

            return $error->getMessage();
        }
    }

    public function delete(Role $role): bool|string
    {
        try {

            return $role->delete();
        } catch (Exception $error) {

            return $error->getMessage();
        }
    }
}