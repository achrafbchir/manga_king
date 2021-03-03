<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorieMangaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_manga', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("categorie_id")->nullable();
            $table->unsignedBigInteger("manga_id");
            $table->timestamps();

            $table->foreign("categorie_id")->on("categories")->references("id")->onDelete("set null");
            $table->foreign("manga_id")->on("mangas")->references("id")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorie_manga');
    }
}
