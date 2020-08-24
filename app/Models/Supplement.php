<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplement extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'supplements';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}