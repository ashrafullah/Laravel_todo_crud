<?php
use App\Task;
use App\Employee;
use Illuminate\Support\Facades\Input;
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
//Task route//////////////////////////////////////////////////////////
Route::get('/','TaskController@index')->name('main');
Route::view('create','create')->name('create');
Route::post('store','TaskController@store')->name('store');
Route::get('edit/{id}','TaskController@edit')->name('edit');
Route::post('update/{id}','TaskController@update')->name('update');
Route::delete('delete/{id}','TaskController@delete')->name('delete');
Route::any('/search','TaskController@search')->name('search');

//Employee Routes//////////////////////////////////////////////////////

Route::get('/employee','EmployeeController@index')->name('employee');
Route::view('employeecreate','employeecreate')->name('employeecreate');
Route::post('employeestore','EmployeeController@store')->name('employeestore');
Route::post('employeeedit/{id}','EmployeeController@store')->name('employeeedit');
Route::post('employeeupdate/{id}','EmployeeController@update')->name('employeeupdate');
Route::post('employeedelete/{id}','EmployeeController@delete')->name('employeedelete');
Route::any('/employeesearch','EmployeeController@search')->name('employeesearch');




//Auth route///////////////////////////////////////////////////////////////////////
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// mail route//////////////////////////////////////////////////////////////////////
Route::get('/send/email', 'MailController@mail');

// File uploadding////////////////////////////////////////////////////////////////////////

Route::get('file','FileController@create');
Route::post('file','FileController@store');

// Image upload//////////////////////////////////////////////////////////////////////////

Route::get('form','FormController@create');
Route::post('form','FormController@store');


