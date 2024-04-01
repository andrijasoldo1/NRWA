<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customer';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Cid';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */

        protected $fillable = ['Fname', 'Lname', 'Mobile', 'Dno', 'Vehicle_id'];

    

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Cid' => 'int',
        'Mobile' => 'int',
        'Dno' => 'int',
        'Vehicle_id' => 'int',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Get the driver associated with the customer.
     */
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'Dno');
    }

    /**
     * Get the car associated with the customer.
     */
    public function car()
    {
        return $this->belongsTo(Car::class, 'Vehicle_id');
    }
}
