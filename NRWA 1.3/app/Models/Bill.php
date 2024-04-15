<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Rental;
use App\Models\Customer;

class Bill extends Model
{
    protected $table = 'bills';
    public $timestamps = false;

    protected $fillable = [
        'bdate', 'advance', 'discount', 'drivercharge', 'famount', 'rental_id', 'customer_id'
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class, 'rental_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
