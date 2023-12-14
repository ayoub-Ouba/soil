<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stokages', function (Blueprint $table) {
            $table->id();
            $table->integer("Stock");
            $table->String("color");
            $table->String("size");
            $table->foreignId('id_type_produit')->references('id')->on('type_products');
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
      
        Schema::table('stokages', function (Blueprint $table) {
            $table->dropForeign(['id_type_produit']);
            $table->dropColumn('id_type_produit');
        });
        Schema::dropIfExists('stokages');
    }
}
