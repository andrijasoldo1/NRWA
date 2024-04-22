<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;
class Company extends Model
{
    protected $table = 'companies';
    public $timestamps = false;

    protected $fillable = [
        'cname', 'owner_id'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }
}
