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
        'nameFather',
        'nameMother',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

  
}
