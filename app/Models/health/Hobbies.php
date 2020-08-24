<?php

namespace App\Models\health;

use Illuminate\Database\Eloquent\Model;

class Hobbies extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hobbies';
    protected $fillable = ["title"];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
