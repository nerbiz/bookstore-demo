<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_genre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('genre_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict');
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
        Schema::table('book_genre', function (Blueprint $table) {
            $table->dropForeign(['genre_id']);
            $table->dropForeign(['book_id']);
        });

        Schema::dropIfExists('book_genre');
    }
}