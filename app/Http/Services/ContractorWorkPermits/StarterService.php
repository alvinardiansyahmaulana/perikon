<?php

namespace App\Http\Services\ContractorWorkPermits;

use App\Models\ContractorWorkPermits\Starter;
use App\Http\Resources\ContractorWorkPermits\StarterResource;
use Exception;

class StarterService
{
    public function getAllStarterData(): StarterResource|string
    {
        try {

            return new StarterResource(Starter::all());
        } catch (Exception $error) {

            return $error->getMessage();
        }
    }

    public function store(array $data): StarterResource|string
    {
        try {
            $data['document_number'] = 'IKO/' . date('d-m-Y') . '/' . $data['access_code'];

            return new StarterResource(Starter::create($data));
        } catch (Exception $error) {

            return $error->getMessage();
        }
    }

    public function update(array $data, Starter $starter): StarterResource|string
    {
        try {
            
            return new StarterResource($starter->update($data));
        } catch (Exception $error) {
            
            return $error->getMessage();
        }
    }

    public function delete(Starter $starter): bool|string
    {
        try {

            return $starter->delete();
        } catch (Exception $error) {

            return $error->getMessage();
        }
    }
}