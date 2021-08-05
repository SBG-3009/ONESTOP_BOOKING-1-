<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->text('description');
            $table->decimal('price');
            $table->dateTime('start_time',$precision=0);
            $table->dateTime('end_time',$precision=0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sport_fields');
    }
}
