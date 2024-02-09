<?php

namespace App\Http\Controllers;

use Response;
use App\Models\User;
use App\Models\Design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designs=Design::where('id_user', auth()->user()->id)->get();;
        return view("admin.Design")->with(["designs"=>$designs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['design_name'=>'required|unique:designs,design_name','version_design'=>'required|in:black,white',
        'design_front' => 'mimes:png,pdf|max:800000','design_back' => 'mimes:png,pdf',
        'design_3' => 'mimes:png,pdf','design_4' => 'mimes:png,pdf']);

        $design=new Design();
        $design->id_user=Auth::user()->id;
        $design->design_name=$request->design_name;
        $designsNams=["design_front","design_back","design_3","design_4"];
        
        for($i=0;$i<count($designsNams);$i++){
                $design_nom=null;
            if(isset($request->{$designsNams[$i]})){
                $design_nom=$request->design_name ."_".$design->id_user. "_" . $i.".".$request->{$designsNams[$i]}->extension();
                $request->{$designsNams[$i]}->storeAs("images",$design_nom);
            }
            $design->{$designsNams[$i]}=$design_nom;
        }
        $design->version_design=$request->version_design;
       
        $design->save();
        return redirect()->route('design.index')->with("message_falsh",'Design is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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
        $request->validate(['version_design'=>'in:black,white',
        'design_front' => 'mimes:png,pdf|max:80000','design_back' => 'mimes:png,pdf|max:80000',
        'design_3' => 'mimes:png,pdf|max:80000','design_4' => 'mimes:png,pdf|max:80000',]);
       
        $design=Design::find($id);
       $design_name=Design::where('design_name',$request->design_name)->where('id','!=',$id)->get();
       if(count($design_name)>=1 ){
            return redirect()->route('design.index')->with("error","this name of design already existe ");
       }else{
            $design->design_name=$request->design_name;
            $designsNams=["design_front","design_back","design_3","design_4"];
            for ($i = 0; $i < count($designsNams); $i++) {
                $design_nom = null;
                if ($request->hasFile($designsNams[$i])) {
                    $design_nom = $request->design_name ."_".$design->id_user. "_" . $i . "." . $request->{$designsNams[$i]}->extension();
                    $image_path = public_path('images/' . $design->{$designsNams[$i]});
                    if (file_exists($image_path) && $design->{$designsNams[$i]}!==Null ) {
                        unlink($image_path);
                    }
                    $request->{$designsNams[$i]}->storeAs("images", $design_nom);
                    $design->{$designsNams[$i]} = $design_nom;
                }else{
                    $design->{$designsNams[$i]} = $design->{$designsNams[$i]};
                }
                
            }
            
            $design->version_design=$request->version_design;
            $design->save();
            return redirect()->route('design.index')->with("message_falsh",'Design is updated');
        }
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $designsNams=["design_front","design_back","design_3","design_4"];
        $design=Design::find($id);
        for($i=0;$i<count($designsNams);$i++){
        if($design->{$designsNams[$i]}!==Null){
           $image_path=public_path('images/'.$design->{$designsNams[$i]});
           if(file_exists($image_path)){
               unlink($image_path);
           }
        }
    }
       
        $design->delete();
        return redirect()->route('design.index')->with("message_falsh",'Design is deleted');
    }
}
