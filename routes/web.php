<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Models\Clinic;
use App\Models\Mashina;
use App\Models\Xaridor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;









Route::get("/", function () {
  return view('welcome', ['xaridor' => Xaridor::all()]);
});







Route::post("/xaridor", function (Request $req) {

  Xaridor::create([
    'name' => $req->name,
    'price' => $req->price,
  ]);
  return back();
});




Route::get("/mashina", function () {
  return view('mashina', ['xaridor' => Mashina::withTrashed()->get()]);
});







Route::post("/mashina", function (Request $req) {
  $validation = $req->validate([
    'name' => 'required|min:5|max:40',
    'color' => 'required|max:20',
  ]);

  Mashina::create([
    'name' => $validation['name'],
    'color' => $validation['color'],
  ]);

  return back()->with('success', 'New Mashina Created Successfully');
});


Route::get('/delete_mashina/{id}', function ($id) {
  Mashina::where('id', $id)->first()->delete();
  return back();
});


Route::get('/restore_mashina/{id}', function ($id) {
  Mashina::withTrashed()->where('id', $id)->first()->update([
    'deleted_at' => null
  ]);

  return back();
});


Route::view('/register', 'register');

Route::post('/save_user', [AuthController::class, 'save_user']);

Route::view('/login', 'login')->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::view('/profil', 'profil')->name('profil');

Route::get('/logout', function () {
  Auth::logout();
  return redirect('/login');
});


Route::group(['middleware' => 'auth'], function () {

  Route::get('/posts', [PostController::class, 'view_posts']);

  Route::post('/create_post', [PostController::class, 'create']);
});
