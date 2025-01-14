<?php

namespace App\Models\Prestaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Retiree extends Model
{
    use HasFactory;

    public function insured(): BelongsTo
    {
        return $this->belongsTo(Insured::class);
    }

    public function beneficiary(): BelongsTo
    {
        return $this->belongsTo(Beneficiary::class);
    }

    public function pensionType(): BelongsTo
    {
        return $this->belongsTo(PensionType::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
