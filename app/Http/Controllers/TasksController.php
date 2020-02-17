<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('id', 'DESC')
                  ->where('userId', auth()->user()->id)
                  ->get();

        return view('tasks', compact('tasks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newTask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task($this->validateRequest());
        $task->userId = auth()->user()->id;
        $task->isDone = 0;
        $task->save();

        return redirect('/task');
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
    public function edit(Task $task)
    {
        return view('editTask', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
      $task->update($this->validateRequest());

      return redirect('/task');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/task');
    }

    public function updateIsDone($task)
    {
          $task = Task::findOrFail($task);

          if ($task->isDone == false) {
            $task->isDone = true;
            $task->save();
          } else {
            $task->isDone = false;
            $task->save();
          };

          return redirect('/task');
    }

    private function validateRequest()
    {
        return request()->validate([
          'task' => 'required|max:255'
        ]);
    }

}
