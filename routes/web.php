<?php

use App\Http\Controllers\user\auth\LoginController;
use App\Http\Controllers\admin\auth\LoginController as AdminLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuthenticated;

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
    return view('layouts._app');
})->middleware(['is_user'])->name('login.user');


Route::get('DashboardAdmin', function () {
    return view('dashboardAdmin');
})->middleware(['is_admin'])->name('admin.Dashboard');


// ### user login

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'handleLogin'])->name('login');

// ## admin login 

Route::get('admin/login', [AdminLoginController::class, 'login'])->name('login.admin');

Route::post('admin/login', [AdminLoginController::class, 'handleLogin'])->name('login.admin');



// Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
//     Route::get('/login', [AdminAuthenticated::class, 'loginAdmin'])->name('adminLogin');
//     Route::post('/login', [AdminAuthenticated::class, 'LoginHandleAdmin'])->name('adminLoginPost');
 
//     Route::group(['middleware' => 'is_admin'], function () {
//         Route::get('/', function () {
//             return view('welcome');
//         })->name('adminDashboard');
 
//     });
// });



// Route::get('/homePage', function () {
//     return view('layouts._app');
// })->name('home.user');

// Route::get('/homePage', [LoginController::class, 'login'])->name('login');
// Route::get('/homePage', [LoginController::class, 'handleLogin'])->name('login.user');


require __DIR__.'/auth.php';
