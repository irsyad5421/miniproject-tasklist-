<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;


class UserController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        
        $user = User::all();
        return view('users')->with('users', $user);
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
    public function store(){
        //


    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
       
    }

    public function show(){

  //
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update( ){

   
     //
//
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
       // 
       

    }

    public function manage($id){
        $user=User::find($id);
        if ($user->manage){
            $user->update(['is_admin' => false]);
            return redirect()->back()->with('success', "Role has been update");
        }else {
            $user->update(['is_admin' => true]);
            return redirect()->back()->with('success', "Role has been update");
        }

    }
}
