<?php

namespace App\Http\Controllers\Api\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Http\Requests\Role\RoleRequest;
use App\Http\Services\Role\RoleService;
use illuminate\Support\Collection;
use Exception;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $service)
    {
        $this->roleService = $service;
    }

    public function index(): Response
    {
        $roles = $this->roleService->getAllRole();

        return responseWithData($roles); 
    }

    public function store(RoleRequest $request): Response
    {
        $role = $this->roleService->create($request->validated());

        return responseWithData($role);
    }

    public function show($id): Response
    {
        $role = $this->roleService->find($id);

        return responseWithData($role);
    }

    public function update(RoleRequest $request, $id)
    {
        $role = $this->roleService->update($request->validated(), $id);

        return responseAfterUpdate($role);
    }

    public function destroy($id)
    {
        $role = $this->roleService->delete($id);

        return responseAfterDelete($role);
    }
}
