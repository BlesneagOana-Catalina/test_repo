<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Carbon\Carbon; 
use Illuminate\Support\Facades\Input;
Route::get('/', function () {
	$contents=null;
	$exists = Storage::exists('file.json');
	if($exists)
	{
	$contents = collect(json_decode(Storage::get('file.json')));
	$data=array("contents"=>$contents);
    return view('add')->with($data);
	}else{
		$data=array("contents"=>collect(null));
		return view('add',$data);
	}
	
});
Route::post('add_user', function () {
    Storage::put('file.json',  json_encode(array(Input::all())));
	echo "Succcess!";
});
