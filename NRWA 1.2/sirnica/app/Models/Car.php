<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;

class Car extends Model
{
    protected $table = 'cars';
    public $timestamps = false; // Postavite timestamps na false

    protected $fillable = [
        'owner_id',
        'license_no',
        'model',
        'year',
        'ctype',
        'drate',
        'wrate',
        'status',
    ];

    // Relacija s vlasnikom
    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }
}
