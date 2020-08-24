<?php

namespace App\Models\drugs;

use Illuminate\Database\Eloquent\Model;

class DrugIntroduction extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'drug_introduction';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
