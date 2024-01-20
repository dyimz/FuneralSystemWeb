<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'age',
        'sex',
        'address',
        'contact',
        'idtype',
        'custimage',
        'custvalidid',
        'custgcashqr',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deceased()
    {
        return $this->hasMany(Deceased::class);
    }



}
