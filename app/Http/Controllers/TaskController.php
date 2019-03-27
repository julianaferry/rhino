<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
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
          'title'=>'required|max:50',
          'body'=> 'required|max:140'
        ]);

        $tasks = new Task([
          'title' => $request->get('title'),
          'body'=> $request->get('body')
        ]);
        $tasks->save();
        return redirect('/tasks')->with('success', 'Task has been added');
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
        $tasks = Task::find($id);

        return view('tasks.edit', compact('tasks'));
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
          $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:140'
           
          ]);
    
          $tasks = Task::find($id);
          $tasks->title = $request->get('title');
          $tasks->body = $request->get('body');
         
          $tasks->save();
    
          return redirect('/tasks')->with('success', 'Task has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = Task::find($id);
        $tasks-> delete();
   
        return redirect('/tasks')->with('success', 'Task has been deleted Successfully');
    }
}
