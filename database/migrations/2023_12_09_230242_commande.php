
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
            $table->date("datecommande")->default(DB::raw('CURRENT_DATE'));
            $table->date("date_done")->nullable();
            $table->date("datevalidation")->nullable();
            $table->date("datelivraison")->nullable();
            $table->String("status")->default('prepared');
            $table->String("socialmedia");
            $table->boolean("confirmation")->default(false);
            $table->string("commentaire_confirmateur")->nullable();
            $table->foreignId('id_user')->references('id')->on('users');
            $table->integer("id_printed1")->nullable(); $table->integer("id_printed2")->nullable();
          
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
