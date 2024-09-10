<?php

namespace App\Models\Prestaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CredentialInsured extends Model
{
    use HasFactory;

    public function insured(): BelongsTo
    {
        return $this->belongsTo(Insured::class);
    }
}
