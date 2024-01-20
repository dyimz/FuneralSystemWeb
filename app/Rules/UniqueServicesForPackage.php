<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Package;

class UniqueServicesForPackage implements Rule
{
    protected $package;

    public function __construct($package = null)
    {
        $this->package = $package;
    }

    public function passes($attribute, $value)
    {

        // Extract the selected service IDs from the input value
        $selectedServiceIds = is_array($value) ? $value : [$value];

        // Query to check if another package already has the exact same services
        $query = Package::whereHas('services', function ($query) use ($selectedServiceIds) {
            $query->whereIn('services.id', $selectedServiceIds);
        });
        // dd($query);

        // If a specific package is provided, exclude it from the query
        if ($this->package) {
            $query->where('id', '!=', $this->package->id);
        }

        // Ensure an exact match of services
        $query->whereHas('services', function ($query) use ($selectedServiceIds) {
            $query->whereIn('services.id', $selectedServiceIds);
        }, '=', count($selectedServiceIds));

        // Check if the package exists
        $existingPackage = $query->exists();

        return !$existingPackage;
    }

    public function message()
    {
        return 'A package with those services already exists.';
    }
}
