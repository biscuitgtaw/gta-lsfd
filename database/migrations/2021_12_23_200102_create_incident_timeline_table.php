<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentTimelineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_timelines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incident_id');
            $table->foreign('incident_id')->references('id')->on('incidents')->onDelete('cascade');;
            $table->string('title');
            $table->longText('description');
            $table->unsignedBigInteger('reporter_id');
            $table->foreign('reporter_id')->references('id')->on('users')->onDelete('cascade');;
            $table->boolean('visible');
            $table->integer('type');
            $table->timestamp('displayed_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incident_timelines');
    }
}
