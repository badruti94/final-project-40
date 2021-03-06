<?php

use Illuminate\Support\Facades\Auth;
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

// pertanyaan route
Route::get('/', 'PertanyaanController@index');
Route::get('/pertanyaan/create', 'PertanyaanController@create');
Route::get('/pertanyaan/{id}', 'PertanyaanController@detail');
Route::get('/pertanyaan/{id}/edit', 'PertanyaanController@edit');
Route::put('/pertanyaan/{id}', 'PertanyaanController@update');
Route::post('/pertanyaan', 'PertanyaanController@store');
Route::delete('/pertanyaan/{id}', 'PertanyaanController@destroy');
Route::get('/pertanyaan/jawaban_tepat/{pertanyaan_id}/{jawaban_id}', 'PertanyaanController@pilihJawabanTepat');

// komentar pertanyaan route
Route::get('/pertanyaan/{id}/komentar', 'KomentarPertanyaanController@index');
Route::get('/pertanyaan/{id}/komentar/edit/{komenId}', 'KomentarPertanyaanController@edit');
Route::post('/pertanyaan/{id}/komentar', 'KomentarPertanyaanController@store');
Route::put('/pertanyaan/{id}/komentar/{komenId}', 'KomentarPertanyaanController@update');
Route::get('/pertanyaan/komentar/{komenId}', 'KomentarPertanyaanController@destroy');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Jawaban
Route::get('/jawaban', 'JawabanController@index');
Route::get('/jawaban/create/{pertanyaan_id}', 'JawabanController@create');
Route::post('/jawaban', 'JawabanController@store');
Route::get('/jawaban/{jawaban_id}/edit', 'JawabanController@edit');
Route::put('/jawaban/{jawaban_id}', 'JawabanController@update');
Route::delete('/jawaban/{jawaban_id}', 'JawabanController@destroy');


//Komentar Jawaban
Route::get('/jawaban/{id}/komentar', 'JawabanController@indexKomentar');
Route::get('/jawaban/create_komentar/{jawaban_id}', 'JawabanController@createKomentar');
Route::post('/jawaban/store_komentar', 'JawabanController@storeKomentar');
Route::get('/jawaban/edit_komentar/{jawaban_id}/{komentar_id}', 'JawabanController@editKomentar');
Route::put('/jawaban/update_komentar/{komentar_id}', 'JawabanController@updateKomentar');
Route::delete('/jawaban/destroy_komentar/{id}', 'JawabanController@destroyKomentar');

//Vote
Route::get('/jawaban/upvote/{pertanyaan_id}/{jawaban_id}', 'VoteController@upVote');
Route::get('/jawaban/downvote/{pertanyaan_id}/{jawaban_id}', 'VoteController@downVote');

Route::get('/pertanyaan/vote/{pertanyaan_id}/{vote}', 'VoteController@votePertanyaan');



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
