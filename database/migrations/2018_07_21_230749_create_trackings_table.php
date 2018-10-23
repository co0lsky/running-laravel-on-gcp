<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tracker_id');
            $table->unsignedInteger('tracking_tracker_id');
            $table->timestamps();

            $table->foreign('tracker_id')
                ->references('id')->on('trackers')
                ->onDelete('cascade');

            $table->unique(['tracker_id', 'tracking_tracker_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trackings');
    }
}
