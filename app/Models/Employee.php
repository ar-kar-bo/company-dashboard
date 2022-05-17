<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'state',
        'city',
        'address',
        'photo',
        'dob',
        'position_id',
        'skill'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

}
