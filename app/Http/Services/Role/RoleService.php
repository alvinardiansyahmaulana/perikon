<?php

namespace App\Http\Services\Role;

use App\Models\Role;
use App\Http\Resources\Role\RoleResource;
use illuminate\Support\Collection;
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

    public function find(string $id): RoleResource|string
    {
        try {

            return new RoleResource(Role::find($id));
        } catch (Exception $error) {

            return $error->getMessage();
        }
    }

    public function update(mixed $data, string $id): bool|string
    {
        try {

            return Role::find($id)->update($data);
        } catch (Exception $error) {

            return $error->getMessage();
        }
    }

    public function delete(string $id): bool|string
    {
        try {

            return Role::find($id)->delete();
        } catch (Exception $error) {

            return $error->getMessage();
        }
    }
}