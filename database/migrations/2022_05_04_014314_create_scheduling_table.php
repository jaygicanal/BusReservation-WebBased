<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduling', function (Blueprint $table) {
            $table->id();
            $table->string('origin');
            $table->string('destination');
            $table->string('via')->nullable();
            $table->string('bus_schedule');
            $table->time('departure_time');
            $table->string('bus_class');
            $table->string('with_wifi');
            $table->string('with_tv');

            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scheduling');
    }
}
