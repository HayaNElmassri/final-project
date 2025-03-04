<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
class TaskController extends Controller
{
    public function index(){
        $tasks = DB::table(table: 'tasks')->get();
        return view ('tasks',compact(var_name:'tasks'));
    }
    
    public function create()
    {
        $task_name=$_POST['name'];
        DB::table(table: 'tasks')->insert(values:['name'=>$task_name]);
        return redirect()->back();
    }
    public function destroy($id){
        DB::table(table: 'tasks')->where(column:'id',operator:$id)->delete();

        return redirect()->back();
    }
    public function edite($id){
        $task= DB::table(table: 'tasks')->where(column:'id',operator:$id)->first();
        $tasks= DB::table(table: 'tasks')->get();
                 return view('tasks',compact('task','tasks'));
}
public function update(){
    $id = $_POST['id'];
    DB::table(table:'tasks')->where(column:'id',operator:'=',value:$id)->update(['name' => $_POST['name']]);
    return redirect(to:'tasks');
}
}