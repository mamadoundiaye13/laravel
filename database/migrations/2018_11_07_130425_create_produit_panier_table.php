<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitPanierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_panier', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produit_id')->unsigned();
            $table->integer('panier_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('produit_panier', function (Blueprint $table){
            $table->foreign('produit_id')->references('id')->on('produit')
                ->onDelete('NO ACTION') -> onUpdate('NO ACTION');



            $table->foreign('panier_id')->references('id')->on('panier')
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
        Schema::dropIfExists('produit_panier');
    }
}
