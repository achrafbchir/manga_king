<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMangasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mangas', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->json("other_names")->nullable(); // serialized values
            $table->string("season")->nullable();
            $table->string("mangaka")->nullable();
            $table->text("synopsis")->nullable();
            $table->unsignedBigInteger("image_id")->nullable();
            $table->string('status')->nullable(); // finised, on going, not released yet...
            $table->string("type"); // manga, webtoon, manhwa...
            $table->string("age_categorie")->nullable();
            $table->date("publication_date")->nullable();
            $table->bigInteger("visit_counter")->default(0);
            $table->float("ratings_avg")->default(0);
            $table->integer("ratings_count")->default(0);
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
        Schema::dropIfExists('mangas');
    }
}
