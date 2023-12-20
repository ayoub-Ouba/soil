<?php

namespace App\Http\Controllers;

use Response;
use App\Models\User;
use App\Models\Produit;
use Illuminate\Http\Request;
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
        $produit=new Produit();
        $produit->color=$request->color;
        $produit->taille=$request->taille;
        $produit->id_commande=$idCmd;
        $produit->id_type=$request->type;
        $produit->id_design=$request->design;
        $produit->save();
        return redirect()->route('commande.index')->with('success');
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
        return redirect()->route('commande.index')->with('success');
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
        return redirect()->route('commande.index')->with('success');
    }
}
