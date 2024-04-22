<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int  $Bno
 * @property int  $Advance
 * @property int  $Discount
 * @property int  $Drivercharge
 * @property int  $Famount
 * @property int  $Rid
 * @property int  $Cid
 * @property Date $BDate
 */
class Bill extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bill';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Bno';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'BDate', 'Advance', 'Discount', 'Drivercharge', 'Famount', 'Rid', 'Cid'
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
        'Bno' => 'int', 'BDate' => 'date', 'Advance' => 'int', 'Discount' => 'int', 'Drivercharge' => 'int', 'Famount' => 'int', 'Rid' => 'int', 'Cid' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'BDate'
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
