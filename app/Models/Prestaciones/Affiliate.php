<?php

namespace App\Models\Prestaciones;

use App\Models\Humanos\Bank;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Affiliate extends Model
{
    use HasFactory;
    public function subdependency(): BelongsTo
    {
        return $this->belongsTo(Subdependency::class);
    }
    public function bank(): BelongsTo
    {
       return $this->belongsTo(Bank::class);
    }
}
