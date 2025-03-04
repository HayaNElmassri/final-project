<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::get('/',  function () {
    return view('welcome');
});
Route::get('/about',function() {
    $name ='Haya';
    $departments = [
      '1'=>'Tichnical',
        '2'=>'Financial',
        '3'=> 'Sales',  
    ];
    return view ('about',compact('name','departments'));
    
});
 Route::post('/about',function(){
    $name =$_POST['name'];
    $departments = [
        '1'=>'Tichnical',
        '2'=>'Financial',
        '3'=> 'Sales',
    ];
    return view ('about',compact(var_name:'name'));
    
});
Route::get('users',action:[UserController::class , 'index']);

Route::post('add',action:[UserController::class, 'add']);

Route::post('remove/{id}',action:[UserController::class, 'remove']);
        Route::post('modify/{id}', action:[UserController::class, 'modify']);
        Route:: post('upgrade', action:[UserController::class, 'upgrade']);
        Route::get('app',action:function(){
            return view(view:'layouts.app');
        });