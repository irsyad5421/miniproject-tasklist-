<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
        $todos = Todo::count();
        $users = User::where('is_admin','0')->count();
        $admins= User::where('is_admin','1')->count();
        $todosdone= Todo::where('complete','1')->count();
        $todosundone= Todo::where('complete','0')->count();
        return view('dashboard',compact('todos','users','admins','todosdone','todosundone'));
    }
}
