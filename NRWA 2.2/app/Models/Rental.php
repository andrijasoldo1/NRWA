<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Driver;
use App\Models\Car;

class Rental extends Model
{
    protected $table = 'rentals';
    protected $fillable = ['rdate', 'amount', 'driver_id', 'vehicle_id'];
    public $timestamps = false;

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Car::class, 'vehicle_id');
    }
}
