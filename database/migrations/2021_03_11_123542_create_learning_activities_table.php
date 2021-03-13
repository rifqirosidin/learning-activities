<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_activities', function (Blueprint $table) {
            $table->id();
            $table->string('activity');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('method_id')->constrained();
            $table->softDeletes();
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
        Schema::table('learning_activities', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('learning_activities');
    }
}
