<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.User')->with(['users'=> User::all()]);  
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
        $request->validate([
            'fullname'=>'required','email'=>'required|email|unique:users,email','state'=>'in:admin,confirmateur,manager,printer',
            'number'=>'required|numeric|min:10', 'password' => 'required|string|min:6|regex:/^(?=.*[a-z])(?=.*\d).+$/'            ]);
            $user = new User();
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->number = $request->number;
            $user->state=$request->user_role;
            $user->password=Hash::make($request->password_confirmation);
            $user->save();
            return redirect()->route('users.index')->with('success');
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
        $user=User::find($id);
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->number = $request->number;
        $user->state=$request->user_role;
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}