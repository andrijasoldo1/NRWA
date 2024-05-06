<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Driver;

class Chauffeur extends Model
{
    protected $table = 'chauffeurs';
    protected $fillable = ['name', 'gender', 'status', 'mobile', 'driver_id'];
    public $timestamps = false;

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
