<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Admin\AdminController;


use App\Http\Controllers\panel\QuestionController;
use App\Http\Controllers\panel\QuizController;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\AjaxGameController;
use App\Http\Controllers\YoutubeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\PayoutController;

//websites route
Route::get('/', [HomeController::class,'index']);
Route::get('/all/shows', [HomeController::class,'allShows'])->name('all.shows');
Route::get('/game/show/{id}', [HomeController::class,'startQuiz'])->name('game.show');

//ajax quize route
Route::get('/get/single/{id}/question', [AjaxGameController::class,'getQuestion']);
Route::post('/ajax/quiz/mark',[AjaxGameController::class,'mark']);





Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


//auth user route
Route::group(['middleware'=>'auth'],function()
{
  
  // Route::view('user/dashboard','user.dashboard')->name('user.dashboard');
  Route::get('payouts',[PayoutController::class,'payout'])->name('payouts');

  //get lifeline by watching youtube video
  // Route::resource('lifeline', YoutubeController::class);
 Route::get('earn/money',[YoutubeController::class,'index'])->name('lifeline.index');
 Route::get('lifeline/create',[YoutubeController::class,'create'])->name('lifeline.create');
  Route::post('/lifeline/store',[YoutubeController::class,'store']);
  
  Route::post('/earn/credits',[CreditController::class,'credit']);


});




//admin route
Route::group(['prefix'=>'admin'],function()
{
  Route::group(['middleware'=>'admin.guest'],function()
  {
    Route::view('/login','admin.admin_login')->name('admin.login');
    Route::post('authenticate',[AdminController::class,'adminLogin'])->name('admin.authenticate');
  });

  //loggedin route
  Route::group(['middleware'=>'admin.auth'],function()
  {

    Route::post('admin/logout',[AdminController::class,'logout'])->name('admin.logout');
     Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

      //icons
     Route::view('icons','Dashboard.icons')->name('icon');
   
     //admin route
     //question crud controller
      Route::resource('question', QuestionController::class);
     //categoories
      Route::resource('quiz', QuizController::class);
     //sub category route

      
     


  });

});  


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
