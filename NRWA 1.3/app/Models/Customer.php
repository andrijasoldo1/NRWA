<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use App\Models\Driver;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'fname',
        'lname',
        'mobile',
        'driver_id',
        'vehicle_id',
    ];

    public $timestamps = false; // Onemogućuje automatsko ažuriranje

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Car::class, 'vehicle_id');
    }
}
