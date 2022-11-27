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
        Schema::create('note_files', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->foreignId('professeur_cours_id')
		  ->onDelete('cascade');
            $table->boolean('archived')->default(0);
            $table->boolean('updated')->default(0);
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
        Schema::dropIfExists('note_files');
    }
};
