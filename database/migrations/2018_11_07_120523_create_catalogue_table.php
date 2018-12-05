<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogue', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produit_catalogue_produit_id')->unsigned();
            $table->integer('produit_id')->unsigned();
            $table->string('titre_produit');
            $table->timestamps();
        });

        Schema::table('catalogue', function (Blueprint $table){
            $table->foreign('produit_id')->references('id')->on('produit')
                ->onDelete('NO ACTION') -> onUpdate('NO ACTION');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogue');
    }
}
