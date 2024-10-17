<?php

namespace App\Models\Humanos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeFamily extends Model
{
    use HasFactory;

    //protected $table = 'employee_families';
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
