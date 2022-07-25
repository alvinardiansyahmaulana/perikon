<?php

namespace App\Http\Controllers\Api\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\Role;
use App\Http\Requests\Role\RoleRequest;
use App\Http\Services\Role\RoleService;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $service)
    {
        $this->roleService = $service;
    }

    public function index(): Response
    {
        return responseWithData($this->roleService->getAllRole()); 
    }

    public function store(RoleRequest $request): Response
    {
        return responseWithData($this->roleService->create($request->validated()));
    }

    public function show(Role $role): Response
    {
        return responseWithData($role);
    }

    public function update(RoleRequest $request, Role $role): Response
    {
        return responseWithData($this->roleService->update($request->validated(), $role));
    }

    public function destroy(Role $role): Response
    {
        return responseAfterDelete($this->roleService->delete($role));
    }
}
