<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $Empid
 * @property int    $Mobile
 * @property string $Name
 */
class CustomerService extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customer_service';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Empid';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name', 'Mobile'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Empid' => 'int', 'Name' => 'string', 'Mobile' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    // Relations ...
}
