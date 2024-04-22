<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int  $Rid
 * @property int  $Amount
 * @property int  $Dno
 * @property int  $Vehicle_id
 * @property Date $Rdate
 */
class Rental extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rental';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Rid';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Rdate', 'Amount', 'Dno', 'Vehicle_id'
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
        'Rid' => 'int', 'Rdate' => 'date', 'Amount' => 'int', 'Dno' => 'int', 'Vehicle_id' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'Rdate'
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
