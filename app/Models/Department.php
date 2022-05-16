<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function position()
    {
        return $this->hasMany(Position::class);
    }

    public function employee()
    {
        return $this->hasManyThrough(Employee::class,Position::class);
    }
}
