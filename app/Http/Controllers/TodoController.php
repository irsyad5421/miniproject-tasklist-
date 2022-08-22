<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        
            $todo = Todo::all();
            return view('index')->with('todos', $todo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }
    public function store(StoreTodoRequest $request){
        
        Todo::create($request->validated());

        return redirect()->route('todos.index')->with('message', 'Task created succesfully');

    }
    

 


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        
        return view('edit')->with('todos', $todo);
    }

    public function show(Todo $todo){

        return view('details')->with('todos', $todo);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request,Todo $todo){

      
      $todo->name=$request->input('name');
      $todo->description=$request->input('description');
      $todo->update();
      session()->flash('success', 'Task updated successfully');
      return redirect()->route('todos.index');
     

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        
        $todo->delete();
        
      return redirect()->route('todos.index')->with('message',"Task deleted successfully");

    }
   
    
    public function complete($id){
        $todo=Todo::find($id);
        if ($todo->complete){
            $todo->update(['complete' => false]);
            return redirect()->back()->with('success', "TODO marked as incomplete!");
        }else {
            $todo->update(['complete' => true]);
            return redirect()->back()->with('success', "TODO marked as complete!");
        }

    }
}
