<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Design;
use App\Models\Produit;
use Illuminate\Support\Str;

class Orders_confirmController extends Controller
{
    public function index(){
        $commandes=Commande::where('status', 'prepared')->get();
        $designs=Design::all();
        return view("admin.index")->with(["commandes"=>$commandes,"designs"=>$designs]);
    }

    public function orderDone(){
        $commandes=Commande::where('id_confirmateur', auth()->user()->id)->where('status', 'shipped')->get();
        return view("confirmateur.orders_confirm")->with(["commandes"=>$commandes]);
    }

    public function confirmation_order($id){
        $commande=Commande::find($id);
        if($commande->confirmation==0){
            $commande->confirmation=1;
            $commande->status='confirmed';
            $commande->id_confirmateur=auth()->user()->id;
        }
        $commande->save();
        return redirect()->route('xx')->with("succes");
        
    }

    public function confirmation2_order($id){
        $commande=Commande::find($id);
        if($commande->confirmation2==0){
            $commande->confirmation2=1;
            $commande->status='confirmed2';
        }else{
            $commande->confirmation2=0;
            $commande->status='done';
        }
        $commande->save();
        return redirect()->route('confirm_orderDone')->with("succes");
        
    }

    public function comment(Request $reques, $id){
        $commande=Commande::find($id);
        $commande->commentaire_confirmateur1=$reques->comment;
        $commande->save();
        return redirect()->route('xx')->with("succes");
    }
    public function comment2(Request $reques, $id){
        $commande=Commande::find($id);
        $commande->commentaire_confirmateur2=$reques->comment;
        $commande->save();
        return redirect()->route('xx')->with("succes");
    }

    public function history(){
        $commandes=Commande::where('id_confirmateur',auth()->user()->id)->where('confirmation2', 1)->get();
        return view('confirmateur.confirmateur_history')->with(['commandes'=>$commandes]);
    }

    public function confirm_audio1(Request $request){
        try {
            $audioName = Str::uuid()->toString().'.'. $request->file('audio')->getClientOriginalExtension();
            $audioPath = $request->file('audio')->storeAs('audio_files', $audioName, 'public');

            // Save information in the database
            $audio = Commande::find(1);
            $audio->audio1 = $audioName; // Save the file path in the database
            $audio->save();
            return response()->json(['audio_url' => asset('storage/' . $audioPath)]);
        } 
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function confirm_audio1_upload(Request $request, $id){
        $audioName = Str::uuid()->toString().'.'. $request->file('audio_upload_1')->getClientOriginalExtension();
        $audioPath = $request->file('audio_upload_1')->storeAs('images', $audioName);

        $audio = Commande::find($id);
        $audio->audio1 = $audioName; // Save the file path in the database
        $audio->save();
        return redirect()->back()->with('success', 'Audio file uploaded successfully.');
    }
    public function confirm_audio2_upload(Request $request, $id){
        $audioName = Str::uuid()->toString().'.'. $request->file('audio_upload_2')->getClientOriginalExtension();
        $audioPath = $request->file('audio_upload_2')->storeAs('audio_files2', $audioName, 'public');

        $audio = Commande::find($id);
        $audio->audio2 = $audioName; // Save the file path in the database
        $audio->save();
        return redirect()->back()->with('success', 'Audio file uploaded successfully.');
    }

}
