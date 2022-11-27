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
        Schema::create('classe_professeur', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classe_id')
		  ->onDelete('cascade');
            $table->foreignId('professeur_id')
                  ->constrained()
		  ->onDelete('cascade');
            $table->string('ecu_id');
            $table->foreign('ecu_id')
            	  ->references('code_mat')
            	  ->on('ecus')
		  ->onDelete('cascade');
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
        Schema::dropIfExists('classe_professeur');
    }
};
