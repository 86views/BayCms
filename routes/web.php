<?php


use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminPostController;


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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::get('/admin', function() {
        return view('admin.index');
    });


//  Route::resource('/admin/users', AdminUserController::class);

//  Route::resource('/admin/posts', AdminPostController::class);

//  Route::resources([
//     'admin.users' => AdminUserController::class,
//     'admin.posts' => AdminPostController::class,
// ]);
 


// Route::middleware(['auth', 'isAdmin'])->group(function () {
//     Route::get('/admin', function() {
//         return view('admin.index');
//     })->name('index');


Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', function(){

        return view('admin.index');




    });

  
    Route::resources([
        'admin.users' => AdminUserController::class,
        'admin.posts' => AdminPostController::class,
    ]);
     
   
});