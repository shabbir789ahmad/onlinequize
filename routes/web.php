<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\panel\VendorController;
use App\Http\Controllers\panel\BrandController;
use App\Http\Controllers\panel\CategoryController;
use App\Http\Controllers\panel\SubCategoryController;
use App\Http\Controllers\panel\ProductController;


//websites route
Route::get('/', function () {
    return view('welcome');
});




//admin route
Route::group(['prefix'=>'vendor'],function()
{
  Route::group(['middleware'=>'vendor.guest'],function()
  {
    Route::view('/login','admin.admin_login')->name('vendor.login');
    Route::post('authenticate',[VendorController::class,'adminLogin'])->name('vendor.authenticate');
  });

  //loggedin route
  Route::group(['middleware'=>'vendor.auth'],function()
  {

    Route::post('vendor/logout',[VendorController::class,'logout'])->name('vendor.logout');
     Route::get('dashboard',[DashboardController::class,'index'])->name('vendor.dashboard');

     //admin route
      Route::resource('brand', BrandController::class);
     //categoories
      Route::resource('category', CategoryController::class);
     //sub category route
      Route::resource('sub_category', SubCategoryController::class);
      Route::get('get/subcategory',[SubCategoryController::class,'subCategory'])->name('sub_category.get');
      //sub category route
      Route::resource('product', ProductController::class);


  });

});  


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
