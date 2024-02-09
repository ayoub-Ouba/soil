<?php

namespace App\Http\Controllers;


use App\Http\Flash;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;



class PrinterController extends Controller
{
    public function IsPrinted1($idP){
        
        $produit=Produit::find($idP);
        $cmd=Commande::find($produit->id_commande);
        if($produit->print_design==0){
            $produit->print_design=1;
            $cmd->id_printed1=auth()->user()->id;
            $now = DB::raw('NOW()');
            $produit->date_print_dtf =$now;
        }
        else{
            $produit->print_design=0;
        }

        $produit->save();
        $prods=$cmd->produits;
        $isPrinted1=true;
        foreach($prods as $prod){
            if($prod->print_design!==1)
                $isPrinted1=false;
        }
        if($isPrinted1){
            $cmd->status="printed1";            
        }else{
            $cmd->status="confirmed";
        }
        $cmd->save();
        return redirect()->route('home')->with("message_falsh",'Product is printed');
    }

    public function IsPrinted2($idP){
        $produit=Produit::find($idP);
        $cmd=Commande::find($produit->id_commande);
        if($produit->print_design_v_fnl==0){
            $produit->print_design_v_fnl=1;
            $now = DB::raw('NOW()');

            $cmd->id_printed2=auth()->user()->id;
            $produit->date_print_Hoodie =$now;
        }
        else
            $produit->print_design_v_fnl=0;
        $produit->save();
        $prods=$cmd->produits;

        $isPrinted2=true;
        foreach($prods as $prod){
            if($prod->print_design_v_fnl!==1)
                $isPrinted2=false;
        }
        if($isPrinted2){
            $cmd->status="done";
            $cmd->date_done=DB::raw('NOW()');
            $cmd->id_printed2=auth()->user()->id;
           
        }else{
            $cmd->status="printed1";
        }
        $cmd->save();
        return redirect()->route('home')->with("message_falsh",'Product is done');
    }
    public function history(){
        $cmd_p1=Commande::where('id_printed1',auth()->user()->id)->get();
        $cmd_p2=Commande::where('id_printed2',auth()->user()->id)->get();

        return view("printer.historique")->with(['commandes_printer1'=> $cmd_p1,'commandes_printer2'=> $cmd_p2]);
    }
}
