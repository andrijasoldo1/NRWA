<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;
use App\Models\Car;

class Owns extends Model
{
    protected $table = 'owns';
    public $timestamps = false;

    protected $fillable = [
        'owner_id', 'vehicle_id'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Car::class, 'vehicle_id');
    }
}
