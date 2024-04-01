<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int  $Rid
 * @property int  $Amount
 * @property int  $Noweeks
 * @property int  $Vehicle_id
 * @property int  $Dno
 * @property Date $Sdate
 */
class Weekly extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'weekly';

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
        'Sdate', 'Amount', 'Noweeks', 'Vehicle_id', 'Dno'
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
        'Rid' => 'int', 'Sdate' => 'date', 'Amount' => 'int', 'Noweeks' => 'int', 'Vehicle_id' => 'int', 'Dno' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'Sdate'
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
