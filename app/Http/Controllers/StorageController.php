<?php

namespace App\Http\Controllers;

use App\Models\Stokage;
use App\Models\Type_product;
use Illuminate\Http\Request;


class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $storage=Stokage::all();
        $type_product=Type_product::all();
        return view("admin.Storage")->with(["storage"=>$storage,"types_products"=>$type_product]);
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
        $stokage = new Stokage();
        $stokage->Stock = $request->stock; $stokage->color = $request->color;
        $stokage->size = $request->size;$stokage->id_type_produit = $request->type_produit;
        $stokage->save();
        return redirect()->route('Stockage.index')->with('success');
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
        $stockage=Stokage::find($id);
        $stockage->Stock = $request->stock; $stockage->color=$request->color;
        $stockage->size = $request->size;$stockage->id_type_produit=$request->type_produit;
        $stockage->save();
        return redirect()->route('Stockage.index')->with("succes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stockage=Stokage::find($id);
        $stockage->delete();
        return redirect()->route("Stockage.index")->with("succes");

    }
}
