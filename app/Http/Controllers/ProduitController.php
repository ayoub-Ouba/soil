<?php

namespace App\Http\Controllers;

use Response;
use App\Models\User;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Models\Commande;

use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function storewithCmd(Request $request, $idCmd)
    {
        $request->validate([
            'color'=>'required','type'=>'required',
            'design'=>'required'],
            ['design.required'=>'You dont have any design or you are not select the design '

            ]
        );
            
        $produit=new Produit();
        $commande=Commande::find($idCmd);
        $produit->color=$request->color;
        $produit->taille=$request->taille;
        $produit->id_commande=$idCmd;
        $produit->id_type=$request->type;
        $produit->id_design=$request->design;
        $produit->save();
    
        $commande->quantite=$commande->produits->count();
        $commande->save();
        return redirect()->route('orders.index')->with("message_falsh",'Product is add to order');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produit=Produit::find($id);
        $produit->color=$request->color;
        $produit->taille=$request->taille;
        $produit->id_type=$request->type;
        $produit->id_design=$request->design;
        $produit->save();
        return redirect()->route('orders.index')->with("message_falsh",'Product is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit=Produit::find($id);
        $produit->delete();
        $commande=Commande::find($produit->id_commande);
        $commande->quantite=$commande->produits->count();
        $commande->save();
        return redirect()->route('orders.index')->with("message_falsh",'Product is deleted');

    }
}
