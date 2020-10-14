<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('texte');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('user_id')->default(0);
            $table->string('departement');
            $table->string('commune');
            $table->string('commune_name');
            $table->string('commune_postal');
            $table->string('pseudo');
            $table->string('email');
            $table->date('limit');
            $table->boolean('active')->default(false);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('region_id')->references('id')->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
