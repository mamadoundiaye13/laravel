<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->not_null();
            $table->integer('produit_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('categorie', function (Blueprint $table){
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
        Schema::dropIfExists('categorie');
    }
}
