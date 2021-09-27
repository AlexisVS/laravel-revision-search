<?php

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $users = User::all();
    return view('welcome', compact('users'));
});

Route::get('/search', function () {
    $search = Request()->search;
    $users = User::query()
        ->where('name', 'Like', '%' . $search . '%')
        ->orWhere('email', 'LIKE', '%' . $search . '%')
        ->get();
    return view('welcome', compact('users'));
});
