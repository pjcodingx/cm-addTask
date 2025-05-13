<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskManager extends Controller
{
    function addTask(){
        return view('task.add');
    }

    function addTaskPost(Request $request){
    
        $request->validate([
            'title' => 'required',
            'deadline' => 'required',
            'description' => 'required'
        ]);

        $task = new Tasks();
        $task->title = $request->title;
        $task->deadline = $request->deadline;
        $task->user_id = Auth::user()->id;
        $task->description = $request->description;
        
        if($task->save()){
            return redirect()->route('home')->with('success','Task added successfully');
        }
        return redirect()->route('task.add')->with('error','Task not added');
    }

    function listTask(){
        $tasks = Tasks::where('user_id',Auth::user()->id)->where('status', NULL)->paginate(5);
        
        return view('welcome', compact('tasks'));
    }

    function updateTaskStatus($id){
        if(Tasks::where('user_id',Auth::user()->id)->where('id', $id)->update(['status' => 'completed'])){

            return redirect(route('home'))->with('success', 'Task updated successfully');
        }
        return redirect(route('home'))->with('error', 'Task not updated');
    }

    function deleteTask($id){
        if(Tasks::where('user_id',Auth::user()->id)->where('id', $id)->delete()){
        
            return redirect(route('home'))->with('success', 'Task Deleted');
        }
        return redirect(route('home'))->with('error', 'Task not Deleted');
    }
}