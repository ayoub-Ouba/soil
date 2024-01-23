<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Commande;

class PrinterController extends Controller
{
    public function IsPrinted1($idP){
        
        $produit=Produit::find($idP);
        $cmd=Commande::find($produit->id_commande);
        if($produit->print_design==0){
            $produit->print_design=1;
            $cmd->id_printed1=auth()->user()->id;}
        else
            $produit->print_design=0;
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
            $cmd->status="prepared";
        }
        $cmd->save();
        return redirect()->route('xx')->with("succes");
    }

    public function IsPrinted2($idP){
        $produit=Produit::find($idP);
        if($produit->print_design_v_fnl==0)
            $produit->print_design_v_fnl=1;
        else
            $produit->print_design_v_fnl=0;
        $produit->save();
        $cmd=Commande::find($produit->id_commande);
        $prods=$cmd->produits;
        $isPrinted2=true;
        foreach($prods as $prod){
            if($prod->print_design_v_fnl!==1)
                $isPrinted2=false;
        }
        if($isPrinted2){
            $cmd->status="printed2";
            $cmd->id_printed2=auth()->user()->id;
        }else{
            $cmd->status="printed1";
        }
        $cmd->save();
        return redirect()->route('xx')->with("succes");
    }
    public function history(){
        $cmd_p1=Commande::where('id_printed1',auth()->user()->id)->get();
        $cmd_p2=Commande::where('id_printed2',auth()->user()->id)->get();

        return view("printer.historique")->with(['commandes_printer1'=> $cmd_p1,'commandes_printer2'=> $cmd_p2]);
    }
}
