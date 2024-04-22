<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeeklyRental extends Model
{
    protected $table = 'weekly_rentals';
    public $timestamps = false;
    protected $fillable = ['rid', 'sdate', 'amount', 'noweeks', 'vehicle_id', 'driver_id'];

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
