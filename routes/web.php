<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin/register', [UserController::class,'register'])->name('admin.register');
Route::post('/admin/register', [UserController::class,'registerProcess'])->name('admin.register.process');


Route::get('/admin-list', [UserController::class, 'adminList'])->name('admin.list');
Route::post('/admin-page', [UserController::class, 'ajax'])->name('admin.page');
Route::get('/edit-admin/{id}',[UserController::class,'editAdmin'])->name('edit.admin');
Route::post('/update-admin',[UserController::class,'updateAdmin'])->name('update.admin');
Route::get('/delete-admin/{id}',[UserController::class,'adminDelete'])->name('delete.admin');
Route::get('/generate-pdf/{id}', [UserController::class, 'generatePDF'])->name('admin.pdf');

Route::get('/admin', [AuthController::class, 'index'])->name('admin');
Route::post('/admin/auth', [AuthController::class, 'auth'])->name('admin.auth');
Route::get('/admin/logout', [AuthController::class, 'logOut'])->name('admin.logout');

Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
// });

// Route::get('/',[UserController::class,'dashboard'])->name('dashboard');

// Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
// Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store');
// Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
// Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
// Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');