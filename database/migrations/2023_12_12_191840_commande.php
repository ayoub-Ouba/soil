<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Commande extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->String("fullName");
            $table->float("Total");
            $table->integer("quantite");
            $table->String("comment");
            $table->String("adress");
            $table->String("city");
            $table->String("number");
            $table->date("datecommande")->default(DB::raw('CURRENT_DATE'));
            $table->date("datevalidation")->nullable();
            $table->date("datelivraison")->nullable();
            $table->String("status")->default('prepared');
            $table->String("socialmedia");
            $table->foreignId('id_user')->references('id')->on('users');
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
        
        Schema::table('commandes', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropColumn('id_user');
        });
        Schema::dropIfExists('commandes');
    }
}
