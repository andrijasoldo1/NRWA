<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $Chid
 * @property int    $Mobile
 * @property int    $Dno
 * @property string $Name
 * @property string $Gender
 * @property string $Status
 */
class Chauffeur extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chauffeur';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Chid';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name', 'Gender', 'Status', 'Mobile', 'Dno'
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
        'Chid' => 'int', 'Name' => 'string', 'Gender' => 'string', 'Status' => 'string', 'Mobile' => 'int', 'Dno' => 'int'
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
