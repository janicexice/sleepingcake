<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugIntroductionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drug_introduction', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('generic_name');
            $table->string('image');
            $table->text('uses');
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drug_introduction');
    }
}
