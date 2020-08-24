<?php

namespace App\Models\drugs;

use Illuminate\Database\Eloquent\Model;

class Treatments extends Model
{
 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'treatments';
    protected $fillable = ["title"];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
