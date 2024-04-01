<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $Compid
 * @property int    $Owner_id
 * @property string $Cname
 */
class Company extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'company';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Compid';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Cname', 'Owner_id'
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
        'Compid' => 'int', 'Cname' => 'string', 'Owner_id' => 'int'
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
