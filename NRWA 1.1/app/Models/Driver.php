<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'DRIVER';
    protected $primaryKey = 'Dno';
    public $timestamps = false;

    protected $fillable = ['Dno'];

    public function customers()
    {
        return $this->hasMany(Customer::class, 'Dno', 'Dno');
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class, 'Dno', 'Dno');
    }
}
