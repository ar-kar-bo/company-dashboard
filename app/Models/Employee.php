<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone','address','photo','dob','position_id','city','state','skill'];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

}
