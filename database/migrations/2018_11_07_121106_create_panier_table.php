<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePanierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panier', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre')->not_null();
            $table->string('photo')->not_null();
            $table->integer('prix')->unsigned();
            $table->integer('quantite')->unsigned();
            $table->integer('produit_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('panier', function (Blueprint $table){
            $table->foreign('produit_id')->references('id')->on('produit')
                ->onDelete('NO ACTION') -> onUpdate('NO ACTION');

           });

        Schema::table('panier', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('panier');
    }
}
