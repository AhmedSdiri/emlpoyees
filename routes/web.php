<?php

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
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    
     Flashy::message('you are logged in!', '#');
    return view('dashboard');
    
   })->middleware('auth');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
// Route::get('/system-management/{option}', 'SystemMgmtController@index');
Route::get('/profile', 'ProfileController@index');

Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
Route::resource('user-management', 'UserManagementController');

Route::resource('employee-management', 'EmployeeManagementController');
Route::post('employee-management/search', 'EmployeeManagementController@search')->name('employee-management.search');

Route::resource('system-management/department', 'DepartmentController');
Route::post('system-management/department/search', 'DepartmentController@search')->name('department.search');

Route::resource('system-management/division', 'DivisionController');
Route::post('system-management/division/search', 'DivisionController@search')->name('division.search');

Route::resource('system-management/country', 'CountryController');
Route::post('system-management/country/search', 'CountryController@search')->name('country.search');

Route::resource('system-management/state', 'StateController');
Route::post('system-management/state/search', 'StateController@search')->name('state.search');

Route::resource('system-management/city', 'CityController');
Route::post('system-management/city/search', 'CityController@search')->name('city.search');

Route::get('system-management/report', 'ReportController@index');
Route::post('system-management/report/search', 'ReportController@search')->name('report.search');
Route::post('system-management/report/excel', 'ReportController@exportExcel')->name('report.excel');
Route::post('system-management/report/pdf', 'ReportController@exportPDF')->name('report.pdf');

//client
Route::resource('client-management', 'ClientController');
Route::post('client-management/search', 'ClientController@search')->name('client-management.search');
//Route::get('client-management.edit', 'ClientController@edit');
//devis
Route::resource('devis-management', 'DevisController');
Route::post('devis-management/search', 'DevisController@search')->name('devis-management.search');
/*Route::post('devis-management/pdf', 'DevisController@pdf')->name('devis-management.pdf');*/
Route::get('devis-management.pdf/{id}','DevisController@pdf')->name('pdf');

//Route::get('devis-management.label/{id}','DevisController@label')->name('label');
//Route::get('consoletvs', 'DevisController@chart');


//datavisualisation
Route::resource('chart-management', 'DataVisulisation');
Route::post('chart-management', 'DataVisulisation@filter')->name('devis-management.filter');



//databasenotification
Route::get('/markAsRead',function(){
    
    auth()->user()->unreadNotifications->markAsRead();
});

//mail notification
/*Route::get('/email', function()
    
    {
     
          Mail::send('emails.test',['name' => 'Ahmed'],function($message)
         {
              $message->to('1ahmedsdiri@gmail.com', 'SomGuy')->subject("welcome!");
         });
    
    });
*/
Route::get('/email','UserManagementController@sendingMail');

//DEVIS EXCEL
/*
Route::post('devis-management/exportExcell', 'DevisController@exportExcel')->name('devis-management.exportExcel');
Route::post('devis-management/downloadExcel', 'DevisController@exportExcel')->name('devis-management.downloadExcel');
Route::post('devis-management/importExcel', 'DevisController@importExcel')->name('devis-management.importExcel');*/


//ReportDevisController
Route::resource('reports-management', 'ReportDevisController');
Route::post('reports-management/search', 'ReportDevisController@search')->name('reports-management.search');
Route::post('reports-management/exportExcell', 'ReportDevisController@exportExcel')->name('reports-management.exportExcel');
Route::post('reports-management/downloadExcel', 'ReportDevisController@exportExcel')->name('reports-management.exportExcel');
Route::post('reports-management/importExcel', 'ReportDevisController@importExcel')->name('reports-management.importExcel');
Route::post('reports-management/exportPDF', 'ReportDevisController@exportPDF')->name('reports-management.exportPDF');


//Accounting
Route::resource('accounting-management', 'AccountingController');
Route::get('accounting-management.label/{id}','AccountingController@label')->name('label');







