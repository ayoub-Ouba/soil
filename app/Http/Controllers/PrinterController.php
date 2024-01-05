<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Commande;

class PrinterController extends Controller
{
    public function IsPrinted1($idP){
        $produit=Produit::find($idP);
        if($produit->print_design==0)
            $produit->print_design=1;
        else
            $produit->print_design=0;
        $produit->save();
        $cmd=Commande::find($produit->id_commande);
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
        }else{
            $cmd->status="printed1";
        }
        $cmd->save();
        return redirect()->route('xx')->with("succes");
    }
}
