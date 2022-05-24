<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Web\SearchController;
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
    return view('welcome');

});
Route::get('/faker/student', function () {
    \App\Models\Student::factory()->count(20)->create();
    echo 'ok';
})->name('faker.student');


Route::prefix('auth')->group(function (){
    //register
    Route::prefix('register')->controller(RegisterController::class)->group(function (){
        Route::get('/','index')->name('auth.register.index');
        Route::post('/store','store')->middleware(['throttle:2,5'])->name('auth.register.store');
    });
});

//register
Route::prefix('search')->controller(SearchController::class)->group(function (){
    Route::get('/','index')->name('app.search.index');
    Route::get('/students','search')->name('app.search.students');
});
