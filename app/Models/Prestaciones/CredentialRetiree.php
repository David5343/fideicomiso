<?php

namespace App\Models\Prestaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CredentialRetiree extends Model
{
    use HasFactory;

    public function retiree(): BelongsTo
    {
        return $this->belongsTo(Retiree::class);
    }
}
