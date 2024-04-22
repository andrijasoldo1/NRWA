<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $Ssn
 * @property int    $Owner_id
 * @property string $Name
 */
class Individual extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'individual';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Ssn';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name', 'Owner_id'
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
        'Ssn' => 'int', 'Name' => 'string', 'Owner_id' => 'int'
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
