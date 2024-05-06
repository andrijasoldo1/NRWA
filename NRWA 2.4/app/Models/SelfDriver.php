<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Driver;

class SelfDriver extends Model
{
    protected $table = 'self_drivers';
    protected $fillable = ['dlno', 'name', 'insurance_no', 'driver_id'];
    public $timestamps = false;

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
}
