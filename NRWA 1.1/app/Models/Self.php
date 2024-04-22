<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $Dlno
 * @property int    $Insurance_no
 * @property int    $Dno
 * @property string $Name
 */
class Selfie extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'self';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Dlno';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name', 'Insurance_no', 'Dno'
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
        'Dlno' => 'int', 'Name' => 'string', 'Insurance_no' => 'int', 'Dno' => 'int'
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
