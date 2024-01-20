<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'price',
        'img',
        'description',
    ];


    public function services()
    {
        return $this->belongsToMany(Service::class, 'package_service')->withPivot('price');
    }

    /**
     * Calculate the total cost of the package.
     */
    public function getTotal()
    {
        $basePrice = $this->price ?? 0.00; // Assuming 'price' is a column in the 'packages' table
        $serviceCost = $this->services->sum('pivot.price');

        return $basePrice + $serviceCost;
    }

}
