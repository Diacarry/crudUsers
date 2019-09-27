<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model {
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hobbies';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * Indicates if the IDs are auto-incrementing.
     * Options: true -> Auto-Increment; false -> No Auto-Increment
     *
     * @var bool
     */
    public $incrementing = true;
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    //protected $keyType = 'string';
    /**
     * Indicates if the model should be timestamped.
     * Options: true -> able; false -> enable
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * Names variables CREATED_AT and UPDATED_AT (default)
     */
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /**
     * Get the User that owns the hobbies.
     */
    public function user() {
        return $this->belongsTo('App\User', 'fk_users', 'email');
    }
}
