<?php

namespace App\Models\Humanos;

use App\Models\Prestaciones\Affiliate;
use App\Models\Prestaciones\AffiliateFamily;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bank extends Model
{
    use HasFactory;

    public function employee():HasMany
    {
        return $this->hasMany(Employee::class);
    }
    public function affiliate():HasMany
    {
        return $this->hasMany(Affiliate::class);
    }
    public function families():HasMany
    {
        return $this->hasMany(AffiliateFamily::class);
    }
}
