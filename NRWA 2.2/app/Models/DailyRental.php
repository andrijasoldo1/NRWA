<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyRental extends Model
{
    protected $table = 'daily_rentals';
    protected $fillable = ['rid', 'sdate', 'amount', 'nodays', 'vehicle_id', 'driver_id'];
    public $timestamps = false;

    public function rental()
    {
        return $this->belongsTo(Rental::class, 'rid');
    }

    public function vehicle()
    {
        return $this->belongsTo(Car::class, 'vehicle_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
}
