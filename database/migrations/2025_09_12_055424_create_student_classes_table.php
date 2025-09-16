<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('student_classes', function (Blueprint $table) {
            $table->id();
            $table->string('grade');
            $table->string('subject');
            $table->string('teacher');
            $table->date('start_date');
            $table->time('time');
            $table->date('end_date');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('student_classes');
    }
};
