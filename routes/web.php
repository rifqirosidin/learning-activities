<?php


use App\Http\Controllers\LearningActivityController;
use App\Http\Controllers\MethodController;
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

Route::get('/learning-activities/trashed', 'App\Http\Controllers\LearningActivityController@trashed')->name('trashed.index');
Route::delete('/learning-activities/permanent-delete/{id}',  'App\Http\Controllers\LearningActivityController@permanentDelete')->name('trashed.destroy');
Route::post('/learning-activities/restore/{id}', 'App\Http\Controllers\LearningActivityController@restore')->name('trashed.restore');

Route::resource('learning-activities', LearningActivityController::class);
Route::resource('methods', MethodController::class);
