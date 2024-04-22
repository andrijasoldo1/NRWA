<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer; 

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = ['mtype', 'discount', 'duration', 'customer_id'];

    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id'); 
    }
}
