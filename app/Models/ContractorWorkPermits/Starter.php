<?php

namespace App\Models\ContractorWorkPermits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Starter extends Model
{
    use HasFactory;
    use Uuids;

    public $incrementing = false;

    protected $fillable = [
        'access_code',
        'document_number',
        'job_name',
        'job_type',
        'start',
        'end'
    ];

    public function contractorWorkPermit(): HasOne
    {
        return $this->hasOne(contractorWorkPermit::class);
    }
}
