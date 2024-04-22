<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'car';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Vehicle_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'License_no', 'Model', 'Year', 'Ctype', 'Drate', 'Wrate', 'Status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'Vehicle_id' => 'int',
        'Year' => 'date',
        'Drate' => 'int',
        'Wrate' => 'int',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'Year',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Get the owner of the car.
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the rentals associated with the car.
     */
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}

