<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Design;

class Orders_confirmController extends Controller
{
    public function index(){
        $commandes=Commande::whereDate('datecommande',date('y-m-d'))->get();
        $designs=Design::all();
        return view("admin.index")->with(["commandes"=>$commandes,"designs"=>$designs]);
    }
    public function confirmation_order($id){
        $commande=Commande::find($id);
        if($commande->confirmation==0){
            $commande->confirmation=1;
        }
        $commande->save();
        return redirect()->route('xx')->with("succes");
        
    }
    public function comment(Request $reques, $id){
        $commande=Commande::find($id);
        $commande->commentaire_confirmateur=$reques->comment;
        $commande->save();
        return redirect()->route('xx')->with("succes");
    }

}
