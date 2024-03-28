
<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->String("commentaire")->nullable();
            $table->String("adress");
            $table->String("city");
            $table->String("number");
            $table->dateTime("datecommande")->default(DB::raw('NOW()'));
            $table->dateTime("date_done")->nullable();
            $table->dateTime("datevalidation")->nullable();
            $table->dateTime("datelivraison")->nullable();
            $table->dateTime("date_confirmation_1")->nullable();
            $table->dateTime("date_confirmation_2")->nullable();
            $table->String("status")->default('prepared');
            $table->String("socialmedia");
            $table->boolean("confirmation")->default(false);
            $table->boolean("confirmation2")->default(false);
            $table->string("commentaire_confirmateur1")->nullable();
            $table->string("commentaire_confirmateur2")->nullable();
            $table->string("audio1")->nullable();
            $table->string("audio2")->nullable();
            $table->foreignId('id_user')->references('id')->on('users');
            $table->foreignId("id_printed1")->nullable()->references('id')->on('users');
            $table->foreignId("id_printed2")->nullable()->references('id')->on('users');
            $table->foreignId("id_confirmateur")->nullable()->references('id')->on('users');
          
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
