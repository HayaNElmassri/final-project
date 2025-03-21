<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Task;
class TaskController extends Controller
{
    public function index(){
       // $tasks = DB::table(table: 'tasks')->get();
        $tasks = Task::all();
        return view ('tasks',compact(var_name:'tasks'));
    }
    
    public function create()
    {
        $task_name=$_POST['name'];
       // DB::table(table: 'tasks')->insert(values:['name'=>$task_name]);
       $task = new Task;
       $task -> name = $task_name;
       $task -> save();

        return redirect()->back();
    }
    public function destroy($id){
        //DB::table(table: 'tasks')->where(column:'id',operator:$id)->delete();
        $task = Task :: find($id);
        if ($task){
            $task -> delete();
        }

        return redirect()->back();
    }
    public function edite($id){
        $task= DB::table(table: 'tasks')->where(column:'id',operator:$id)->first();
        $tasks= DB::table(table: 'tasks')->get();
                 return view('tasks',compact('task','tasks'));
}
public function update(Request $request){
    //$id = $_POST['id'];
   // DB::table(table:'tasks')->where(column:'id',operator:'=',value:$id)->update(['name' => $_POST['name']]);
   $task = Task :: find($request->id);
   if ($task){
    $task->name = $request->name;
    $task->save();
   }
    return redirect(to:'tasks');
}
}