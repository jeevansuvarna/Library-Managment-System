<?php
use App\library;
use App\people;
use App\admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

Route::get('/',function() {
	return view('welcome');
});

Route::get('home', function () {
    return view('home');
});

Route::get('userlogin',function(){
	return view('userLogin');
});

Route::post('verify_user_login','logcontroller@verify_user_login');

Route::get('userpage', function () {
    if(Session::has('userkey'))
    {
    	$res=admin::select('name','phone')->orderby('name')->get();
    	$books=library::all()->count();
    	$users=people::all()->count();
    	$admins=admin::all()->count();
    	$genre=library::select('genre')->distinct()->count('genre');
		return view('/userpage',compact('res','books','users','admins','genre'));
    }
	else
		echo "<script>  window.location='/login_error'; </script>";
});

Route::get('adminlogin', function () {
    return view('admin/adminLogin');
});

Route::get('usersignup',function(){
	return view('userSignin');
});

Route::post('verify_admin_login','logcontroller@verify_admin_login');

Route::get('adminpage', function () {
    if(Session::has('adminkey'))
    {
		return view('admin/adminpage');
    }
	else
		echo "<script>  window.location='/login_error'; </script>";
});

Route::post('add_book','libcontroller@add_book');

Route::get('userdetails',function(){
	if(Session::has('adminkey'))
	{
		$res=people::orderBy('issue1','DESC')->orderBy('issue2','DESC')->orderBy('name','ASC')->get();
		return view('admin/userdetails',compact('res'));
	}
	else
		echo "<script>  window.location='/login_error'; </script>";
});

Route::get('bookdetails',function(){
	if(Session::has('adminkey'))
	{
	$res=library::orderby('book_name')->get();
	return view('admin/bookdetails',compact('res'));
	}
	else
		echo "<script>  window.location='/login_error'; </script>";
});

Route::get('edit/{id}','libcontroller@edit');

Route::post('update_book','libcontroller@update_book');

Route::post('delete_book','libcontroller@delete_book');



Route::get('change_adminpassword', function () {
	if(Session::has('adminkey'))
		return view('admin/changepassword');
	else
		echo "<script>  window.location='/login_error'; </script>";
});

Route::post('update_admin_password','logcontroller@update_admin_password');

Route::get('delete_admin','logcontroller@delete_admin');

Route::get('add_admin',function() {
	if(Session::has('adminkey'))
		return view('admin/addAdmin');
	else
		echo "<script>  window.location='/login_error'; </script>";
});

Route::post('admin_register','registercontroller@admin_register');

Route::get('adminlogout','logcontroller@adminlogout');

Route::post('user_register','registercontroller@user_register');

Route::get('login_error',function(){
	return view('/request_login');
});

Route::get('profile','logcontroller@showprofile');

Route::get('books',function(){
	if(Session::has('userkey'))
    {
    	$res=library::orderBy('book_name')->get();
    	return view('books',compact('res'));
    }
	else
		echo "<script>  window.location='/login_error'; </script>";
});

Route::get('describe/{id}','libcontroller@describe');

Route::get('change_userpassword', function () {
	if(Session::has('userkey'))
		return view('/changepassword');
	else
		echo "<script>  window.location='/login_error'; </script>";
});

Route::post('update_user_password','logcontroller@update_user_password');

Route::get('delete_user','logcontroller@delete_user');

Route::get('userlogout','logcontroller@userlogout');

Route::post('borrow','libcontroller@borrow');

Route::post('/upload','logcontroller@upload');

Route::get('return1/{user_id}/{book1_id}','libcontroller@return1');
Route::get('return2/{user_id}/{book2_id}','libcontroller@return2');