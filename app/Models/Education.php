<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'school',
        'degree',
        'start_date',
        'end_date',
        'note'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
