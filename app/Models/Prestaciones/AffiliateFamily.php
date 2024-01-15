<?php

namespace App\Models\Prestaciones;

use App\Models\Humanos\Bank;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AffiliateFamily extends Model
{
    use HasFactory;

    protected $table = 'affiliate_families';

    public function affiliate(): BelongsTo
    {
        return $this->belongsTo(Affiliate::class);
    }
    public function bank(): BelongsTo
    {
       return $this->belongsTo(Bank::class);
    }
}
