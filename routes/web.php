<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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



Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    //
    Route::name('admin.')->group(function () {
        //Publikasi
        Route::get('backend/dashboard','DashboardController@index')->name('dashboard_index');
        Route::get('backend/publikasi','PublikasiController@index')->name('publikasi_index');
        Route::get('backend/publikasi/publikasi_table_detail/{id}','PublikasiController@publicationTableDetail')->name('pubTable.detail');
        Route::post('backend/publikasi/post','PublikasiController@postPublikasi')->name('pubCollection.store');
        Route::get('backend/table/publikasi','PublikasiController@publicationListTable')->name('pubCollection.table');
    
        //Tabel Publikasi
        Route::post('backend/pub_table/{pub_id}','PubTableController@create')->name('pubTable_create');    
    });
});




/*Route::get('/', function () {
    return view('welcome');
});*/
Route::name('home.')->group(function () {
    Route::get('/','HomeController@index')->name('home');
});






