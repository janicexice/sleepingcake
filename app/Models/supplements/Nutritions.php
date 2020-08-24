<?php

namespace App\Models\supplements;

use Illuminate\Database\Eloquent\Model;

class Nutritions extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nutritions';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
