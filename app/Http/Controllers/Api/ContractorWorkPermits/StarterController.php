<?php

namespace App\Http\Controllers\Api\ContractorWorkPermits;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStarterRequest;
use App\Http\Requests\UpdateStarterRequest;
use App\Models\ContractorWorkPermits\Starter;
use App\Http\Services\ContractorWorkPermits\StarterService;
use Illuminate\Http\Response;

class StarterController extends Controller
{
    protected $starterService;

    public function __construct(StarterService $starterService)
    {
        $this->starterService = $starterService;
    }

    public function index(): Response
    {
        return responseWithData($this->starterService->getAllStarterData());
    }

    public function store(StoreStarterRequest $request): Response
    {
        return responseWithData($this->starterService->store($request->validated()));
    }

    public function show(Starter $starter): Response
    {
        return responseWithData($starter);
    }

    public function update(UpdateStarterRequest $request, Starter $starter): Response
    {
        return responseWithData($this->starterService->update($request->validated(), $starter));
    }

    public function destroy(Starter $starter)
    {
        return responseAfterDelete($this->starterService->delete($starter));
    }
}
