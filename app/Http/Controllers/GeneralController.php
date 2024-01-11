<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function download($id)
    {
        return response()->download(public_path('images/'.$id));
    }
    
    public function Users(){
        User::count();
    }
}
