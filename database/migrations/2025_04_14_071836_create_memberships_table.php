<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->integer('age');
            $table->string('gender');
            $table->string('current_body_type');
            $table->string('desired_body_type');
            $table->float('weight');
            $table->float('target_weight')->nullable();
            $table->integer('height');
            $table->string('workout_time');
            $table->text('medical_history')->nullable();
            $table->integer('membership_plan');
            $table->timestamps();


        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
