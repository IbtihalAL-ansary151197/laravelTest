<?php

use App\Http\Controllers\user\auth\LoginController;
use App\Http\Controllers\admin\auth\LoginController as AdminLoginController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuthenticated;
use App\Models\Category;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/DashboardUser', function () {
    return view('dashboardAdmin');
})->name('login.user');


Route::get('DashboardAdmin', function () {
    return view('layouts._app');
})->middleware(['is_admin'])->name('admin.Dashboard');


// ### user login

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'handleLogin'])->name('login');

// ## admin login 

Route::get('admin/login', [AdminLoginController::class, 'login'])->name('login.admin');

Route::post('admin/login', [AdminLoginController::class, 'handleLogin'])->name('login.admin');

 
// ### Add Category

// route index for dispaly all categories
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

// route create for create new category
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

// route store thype post for save data 
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

// route edit fro show edit frorm
Route::get('category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
// route update for update date 
Route::put('category/{id}/update', [CategoryController::class, 'update'])->name('category.update');

// route update for update date 
Route::get('category/{id}/update', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/category/restore', [CategoryController::class, 'trash'])->name('category.trash');
Route::get('category/{id}/restore', [CategoryController::class, 'restore'])->name('category.restore');

// Route::get('api/categories', function(){
//     return [
//         'categories'=>[
//             'cat1' => [
//                 'name' => 'ibtihal',
//                 'tes' => 'test'
//             ]
//         ]
//     ];
// });



// Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
//     Route::get('/login', [AdminAuthenticated::class, 'loginAdmin'])->name('adminLogin');
//     Route::post('/login', [AdminAuthenticated::class, 'LoginHandleAdmin'])->name('adminLoginPost');
 
//     Route::group(['middleware' => 'is_admin'], function () {
//         Route::get('/', function () {
//             return view('welcome');
//         })->name('adminDashboard');
 
//     });
// });


require __DIR__.'/auth.php';
