<?php
use App\Task;
use App\Employee;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/','ApiController@index_api')->name('main');
Route::view('create','create')->name('create');
Route::post('store','ApiController@store_api')->name('store');
Route::get('edit/{id}','ApiController@edit')->name('edit');
Route::post('update/{id}','ApiController@update_api')->name('update');
Route::delete('delete/{id}','ApiControllerApiController@delete_api')->name('delete');
