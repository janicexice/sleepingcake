<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'health';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}