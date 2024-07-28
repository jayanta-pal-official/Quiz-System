<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;

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
        return view('index');
    })->name('index');

// Route::get('/question', function () {
//         return view('question');
//     })->name('question');

Route::get('/start', function () {
        return view('start');
    })->name('start');

Route::get('/end', function () {
        return view('end');
    })->name('end');

    Route::get('/ansdesk', function () {
        return view('ansDesk');
    })->name('ansdesk');

Route::group(['middleware' => 'guest'], function () {
    
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');


    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::post('/addquestion', [QuestionController::class, 'addQuestion'])->name('addquestion');
Route::get('/question', [QuestionController::class, 'showQuestion'])->name('question');

Route::post('/updatequestion', [QuestionController::class, 'updateQuestion'])->name('updatequestion');

Route::get('/deletequestion/{id}',[QuestionController::class,'deleteQuestion'])->name('deletequestion');


Route::get('/startquize', [QuestionController::class, 'startQuiz'])->name('startquize');
Route::post('/submitans', [QuestionController::class, 'submitAns'])->name('submitans');


