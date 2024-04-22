<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\CustomerService;

class Feedback extends Model
{
    protected $table = 'feedbacks';
    protected $fillable = ['message', 'email', 'customer_service_id', 'customer_id'];
    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function service()
    {
        return $this->belongsTo(CustomerService::class, 'customer_service_id');
    }
}
