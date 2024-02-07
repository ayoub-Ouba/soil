<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->String("color");
            $table->String("taille");
            $table->foreignId('id_commande')->references('id')->on('commandes');
            $table->foreignId('id_type')->references('id')->on('type_products');
            $table->foreignId('id_design')->references('id')->on('designs');
            $table->boolean('print_design')->default(false);
            $table->boolean('print_design_v_fnl')->default(false);
            $table->dateTime('date_print_dtf')->nullable();
            $table->dateTime('date_print_Hoodie')->nullable();
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
        Schema::table('produits', function (Blueprint $table) {
            $table->dropForeign(['id_type']);
            $table->dropColumn('id_type');
            $table->dropForeign(['id_design']);
            $table->dropColumn('id_design');
            $table->dropForeign(['id_commande']);
            $table->dropColumn('id_commande');
        });
        Schema::dropIfExists('produits');
    }
}