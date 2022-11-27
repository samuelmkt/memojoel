<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_tp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tp_id')
		  ->onDelete('cascade');
            $table->foreignId('student_id')
		  ->onDelete('cascade');
            $table->date('date_soumission');
            $table->string('url');
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
        Schema::dropIfExists('student_tps');
    }
};
