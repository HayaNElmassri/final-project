<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\User;
class UserController extends Controller
    {
        public function index(){
            $users = DB::table(table: 'users')->get();
            return view ('users',compact(var_name:'users'));
        }
        
        public function add()
        {
            $user_name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            DB::table(table: 'users')->insert(
                values:[
                    'name'=>$user_name,
                    'email'=>$email,
                    'password'=>$password
                ]);
            return redirect()->back();
        }
        public function remove($id){
          //  DB::table(table: 'users')->where(column:'id',operator:$id)->delete();
           User ::findOrFail($id)->delete();
           
            return redirect()->back();
        }
        public function modify($id){
           // $user= DB::table(table: 'users')->where(column:'id',operator:$id)->first();
            //$users= DB::table(table: 'users')->get();
            User ::findOrFail($id);
            $user = User ::all();
                     return view('users',compact('user','users'));
    }
    public function upgrade(){
        $id = $_POST['id'];
        DB::table(table:'users')->where(column:'id',operator:'=',value:$id)->update(['name' => $_POST['name']]);
        return redirect(to:'users');
    }
    }
