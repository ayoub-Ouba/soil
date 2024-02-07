<?php

namespace App\Http\Controllers;

use Response;
use App\Models\User;
use App\Models\Commande;
use App\Models\Type_product;
use App\Models\Produit;
use App\Models\Design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes=Commande::where('id_user', auth()->user()->id)->get();
        $types_produits=Type_product::all();
       
        $designs=Design::where('id_user',auth()->user()->id)->get();
        return view("admin.commande")->with(["commandes"=>$commandes, "types_produits"=>$types_produits, "designs"=>$designs]);
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
        $request->validate(['comment'=>'max:250', 'number'=>'required|digits:10',
        'full_name'=>'max:65', 'adresse'=>'max:150', 'city'=>'max:250', 'socialmediaV'=>'max:100']);

        $commande=new Commande();
        $commande->fullName=$request->full_name;
        $commande->quantite=0;
        $commande->Total=$request->total;
        $commande->commentaire=$request->comment;
        $commande->adress=$request->adresse;
        $commande->city=$request->city;
        $commande->number=$request->number;
        $commande->socialmedia=$request->socialmedia." : ".$request->socialmediaV;
        $commande->id_user=auth()->user()->id;
    

        $commande->save();
        return redirect()->route('orders.index')->with("message_falsh",'Order is add');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return redirect()->route('commande.index')->with(['id_commande' => $id]);
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
        $request->validate(['comment'=>'max:250', 'number'=>'required|digits:10',
        'full_name'=>'max:65', 'adresse'=>'max:150', 'city'=>'max:250', 'socialmediaV'=>'max:100']);

        $commande=Commande::find($id);
        $commande->fullName=$request->full_name;
        $commande->Total=$request->total;
        $commande->commentaire=$request->comment;
        $commande->adress=$request->adresse;
        $commande->city=$request->city;
        $commande->number=$request->number;
        $commande->socialmedia=$request->socialmedia." : ".$request->socialmediaV;
        $commande->save();
        return redirect()->route('orders.index')->with("message_falsh",'Order is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commande=Commande::find($id);
        Produit::where('id_commande', $id)->delete();
        $commande->delete();
        return redirect()->route('orders.index')->with("message_falsh",'Order is deleted');
    }
}
