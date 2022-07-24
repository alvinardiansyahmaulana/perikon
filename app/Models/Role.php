<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\Uuids;

class Role extends Model
{
    use HasFactory;
    use Uuids;

    public $incrementing = false;

    protected $fillable = [
        'name'
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
