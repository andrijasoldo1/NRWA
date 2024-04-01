<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $Fid
 * @property int    $Empid
 * @property int    $Cid
 * @property string $Message
 * @property string $Email
 */
class Feedback extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'feedback';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'Fid';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Message', 'Email', 'Empid', 'Cid'
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
        'Fid' => 'int', 'Message' => 'string', 'Email' => 'string', 'Empid' => 'int', 'Cid' => 'int'
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
