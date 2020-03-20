<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo; //trait

class todoscontroller extends Controller
{
    //
    public function index(){
        $todos = Todo::all();
        //return view('todos',['todos' => $todos]);
        //return view('todos')->with('todos', $todos);
        return view('todos.index' , compact('todos'));
    }
    public function show(Todo $todo){
       
        return view('todos.show')->with('todo', ($todo)) ;
    }
    public function create(){
        return view('todos.create');
    }
    public function store(Request $request){
       //dd($request);
    //way to return value:
       // return $request->all();
        //return $request->input('todoTitle');
    //return $request->todoTitle;
    //how to add todos to database
         $request->validate([
           'todoTitle'=>'required|min:6',
             'todoDescription'=>'required'
        ]);
        
        
        $todo = new Todo();
       $todo->title = $request->todoTitle;
        $todo->description = $request->input ('todoDescription');
        $todo->save();
        $request->session()->flash('success' ,'Todo created successufly');
        return redirect('/todos');
       
        
    }
    public function edit(Todo $todo){
        //$todo = Todo::find($todo);
        return view('todos.edit')->with('todo',$todo);
    }
    public function update(Request $request , Todo $todo){
         $request->validate([
           'todoTitle'=>'required|min:6',
             'todoDescription'=>'required'
        ]);
        //$todo = Todo::find($todo);
        $todo->title = $request->get('todoTitle');
        $todo->description = $request->get('todoDescription');
        $todo->save();
         $request->session()->flash('success' ,'Todo updated successufly');
        return redirect('/todos');
    }
    public function destroy(Todo $todo){
        //$todo=Todo::find($todo);  3shan 3mlna obeject mn el model Todo
        $todo->delete();
      session()->flash('success' ,'Todo deleted successufly');
        return redirect('/todos');
    }
    public function complete(Todo $todo){
        $todo->completed = true;
        $todo->save();
         session()->flash('success' ,'Todo completed successufly');
        return redirect('/todos');
    }
}
