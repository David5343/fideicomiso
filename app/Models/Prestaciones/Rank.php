<?php

namespace App\Models\Prestaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rank extends Model
{
    use HasFactory;

    public function insured(): HasMany
    {
        return $this->hasMany(Insured::class, 'rank_id');
    }
}
