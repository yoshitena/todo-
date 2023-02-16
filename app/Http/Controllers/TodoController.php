<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
  {
    $todos = Todo::all();
    return view('index', ['todos' => $todos]);
    
  }


  public function store(Request $request)
  {
    $form = $request->all();
    Todo::create($form);
    return redirect('/');
  }

  public function update(Request $request)
  {
    $form = $request->all();
    unset($form['_token']);
    Todo::where('id', $request->id)->update($form);
    return redirect('/');
  }
}
