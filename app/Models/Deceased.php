<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deceased extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'fname',
        'mname',
        'lname',
        'relationship',
        'causeofdeath',
        'sex',
        'religion',
        'age',
        'dateofbirth',
        'dateofdeath',
        'placeofdeath',
        'citizenship',
        'address',
        'civilstatus',
        'occupation',
        'namecemetery',
        'addresscemetery',
        'image',
        'idtype',
        'validid',
        'transferpermit',
        'swabtest',
        'proofofdeath',
    ];

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

  
}
