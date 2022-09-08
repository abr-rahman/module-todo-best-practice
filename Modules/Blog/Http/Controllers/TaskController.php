<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('blog::index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blog::create');
    }

    public function taskStore(Request $request)
    {
        $request->validate([
            'task' => 'required'
        ]);

        Task::create([
            'task' => $request->task
        ]);

        return back();

    }

    public function show($id)
    {
        return view('blog::show');
    }
    public function inactiveStatus($id)
    {
        $task = Task::find($id);
        if($task->status == 1 || $task->status == 2){
            $task->status = 0;
        }
        $task->save();
        return back();
    }

    public function activeStatus($id)
    {
        $task = Task::find($id);
        if($task->status == 0 || $task->status == 2){
            $task->status = 1;
        }
        $task->save();
        return back();
    }

    public function pendingStatus($id)
    {
        $task = Task::find($id);
        $taskStatus = $task->status;
        if($taskStatus == 1 || $taskStatus == 0){
            $task->status = 2;
        }
        $task->save();

        return back();
    }

    public function taskDelete($id)
    {
        $task = Task::find($id);

        $task->delete();

        return back();
    }
    public function forceDelete($id)
    {
        Task::where('id', $id)->withTrashed()->forceDelete();

        return back();
    }
    public function taskRestore($id)
    {
        Task::where('id', $id)->withTrashed()->restore();

        return back();
    }
    public function restoreAll()
    {
        Task::onlyTrashed()->restore();

        return back();
    }
    public function forceDeleteAll()
    {
        Task::onlyTrashed()->forceDelete();

        return back();
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('blog::edit', compact('task'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'task' => 'required'
        ]);
        $task = Task::find($id);
        $task->task = $request->task;
        $task->save();
        return redirect('/blog');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
