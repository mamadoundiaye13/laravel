<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_produit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('produit_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('user_produit', function (Blueprint $table){
            $table->foreign('produit_id')->references('id')->on('produit')
            ->onDelete('NO ACTION') -> onUpdate('NO ACTION');
        });

        Schema::table('user_produit', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('produit')
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
        Schema::dropIfExists('user_produit');
    }
}
