<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Owner;

class Bank extends Model
{
    protected $table = 'banks';
    public $timestamps = false;

    protected $fillable = [
        'bname', 'city', 'owner_id'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }
}
