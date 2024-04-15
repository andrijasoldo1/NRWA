<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;

class Individual extends Model
{
    protected $table = 'individuals';
    public $timestamps = false;

    protected $fillable = [
        'ssn', 'name', 'owner_id'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }
}
