<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BloodrequestController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\Backend\UsermanagementController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BloodusesController;
use App\Http\Controllers\LabtechinventoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('list_bookcategory', [App\Http\Controllers\backend\BookcategoryController::class,'BookCategoryList'])->name('bookcategory.index');
Route::get('/add_bookcategory',[App\Http\Controllers\backend\BookcategoryController::class,'BookCategoryAdd'])->name('bookcategoryadd');
Route::post('/insert_bookcategory', [App\Http\Controllers\backend\BookcategoryController::class,'BookCategoryInsert']);
Route::get('/edit_bookcategory/{id}', [App\Http\Controllers\backend\BookcategoryController::class,'BookEditCategory']);
Route::post('/update_bookcategory/{id}', [App\Http\Controllers\backend\BookcategoryController::class,'BookUpdateCategory']);
Route::get('/delete_bookcategory/{id}', [App\Http\Controllers\backend\BookcategoryController::class,'BookDeleteCategory']);

Route::get('user_list', [App\Http\Controllers\backend\UsermanagementController::class,'UserList'])->name('user.index');
Route::get('/add_user', [App\Http\Controllers\backend\UsermanagementController::class,'UserAdd']);
Route::get('/insert_user', [App\Http\Controllers\backend\UsermanagementController::class,'UserInsert']);
Route::get('/edit_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserEdit']);
Route::post('/update_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserUpdate']);
Route::get('/delete_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserDelete']);

Route::get('list_bookcategory', [App\Http\Controllers\backend\BookcategoryController::class,'BookCategoryList'])->name('bookcategory.index');

Route::resource("/notifications", NotificationController::class);


Route::resource("/blood_donation", DonationController::class);
Route::resource("/stocks", StocksController::class);
// Route::resource('/home', [App\Http\Controllers\HomeController::class,'charts'])->name('charts');

Route::resource("/blooduse", BloodusesController::class);

Route::resource("/lab_inventory", LabtechinventoryController::class);

Route::resource("/admin", UserController::class);

Route::resource("/blood_requests", BloodrequestController::class);

Route::post('/blood_requests/accept-all', [BloodrequestController::class,'acceptAll'])->name('blood_requests.accept-all');

Route::delete('/blood_requests/delete-all', 'BloodrequestController@deleteAll')->name('blood_requests');

Route::resource("/chats", ChatController::class);

Route::resource("/doctor", DoctorController::class);



