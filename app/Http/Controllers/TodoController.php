<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
  {
    $todos = Todo::all();
    return view('index', ['todos' => $todos]);
    
  }


  public function store(TodoRequest $request)
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
  public function delete(Request $request)
  {
    Todo::find($request->id)->delete();
    return redirect('/');
  }

}

