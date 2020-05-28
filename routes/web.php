<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;


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


//URL::forceRootUrl('https://webapps.bps.go.id/acehbaratkab/e-data/');
//URL::forceScheme('https');
Auth::routes();


Route::group(['middleware' => ['auth']], function () {

    Route::get('backend', function () {
        return redirect()->route('admin.dashboard_index');
    });
    Route::name('admin.')->group(function () {
        //Publikasi
        Route::get('backend/dashboard','DashboardController@index')->name('dashboard_index');
        Route::get('backend/publikasi','PublikasiController@index')->name('publikasi_index');
        Route::get('backend/publikasi/publikasi_table_detail/{id}','PublikasiController@publicationTableDetail')->name('pubTable.detail');
        Route::post('backend/publikasi/post','PublikasiController@postPublikasi')->name('pubCollection.store');
        Route::get('backend/table/publikasi','PublikasiController@publicationListTable')->name('pubCollection.table');
        Route::post('backend/publikasi/{id}/post/n_bab','PublikasiController@storeJumlahBab')->name('pubCollection.n_bab.store');
        Route::post('backend/delete/publikasi','PublikasiController@deletePublikasi')->name('publikasi.delete');
        //api publikasi
        Route::get('backend/publikasi/pub_api','WebApiPublikasiController@publicationListApi')->name('pubApi.list');
        Route::post('backend/publikasi/pub_api','WebApiPublikasiController@publicationListApi')->name('pubApi.list.post');
        Route::get('backend/publikasi/data/pub_api','WebApiPublikasiController@getApiData')->name('pubApi.data');

        //Tabel yang ada dalam sebuah  Publikasi
        Route::get('backend/pub_table/add_table_form/{pub_id}','PubTableController@pubTableForm')->name('pubTable_form');
        Route::get('backend/pub_table/add_table_form/{pub_id}/update/{pubtable_id}','PubTableController@pubTableFormUpdate')->name('pubTable_form_update');


        ///----create
        Route::post('backend/pub_table/{pub_id}','PubTableController@create')->name('pubTable_create');
        ///---update    
        Route::post('backend/pub_table/{pub_id}/update/{pubtable_id}','PubTableController@update')->name('pubTable_update'); 
        
        Route::post('backend/pub_table/getListTableByBab/index/{pub_id}','PubTableController@changeBabPubTableEvent')
        ->name('pubTableCollection.pubTableList');

        ///--------------service table publikasi---//
         Route::get('backend/table/pub_table/{pub_id}/{bab_num}','PubTableController@tableDatabyBab')
         ->name('pubTableCollection.table');
    });
});




/*Route::get('/', function () {
    return view('welcome');
});*/
Route::name('home.')->group(function () {
    Route::get('/','HomeController@index')->name('home');
    Route::get('/faq','HomeController@faqIndex')->name('faq');

    #### search data $$$

    Route::get('/{subject_id}/subject_index','SearchEngineController@subject_detail')->name('subject_detail');
    Route::get('/result?={keyword}','SearchEngineController@search_result_index')->name('seach_index');
    Route::post('/search/post','SearchEngineController@post_search')->name('seach_post');

    #---services--
    Route::get('/table/keyword={keyword}','SearchEngineController@searchTable')->name('seach_result.table');
    
});

Route::get('temp', function () {
    return view('layout.master_front_2');
});

//Clear configurations:
Route::get('/config-clear', function() {
    $status = Artisan::call('config:clear');
    return '<h1>Configurations cleared</h1>';
});

//Clear cache:
Route::get('/cache-clear', function() {
    $status = Artisan::call('cache:clear');
    return '<h1>Cache cleared</h1>';
});

//Clear configuration cache:
Route::get('/config-cache', function() {
    $status = Artisan::call('config:Cache');
    return '<h1>Configurations cache cleared</h1>';
});

//migrate
Route::get('/migrate', function() {
    $status = Artisan::call('migrate:fresh --seed');
    return '<h1>migrate and seed success</h1>';
});

Route::get('/storage-link', function() {
    $status = Artisan::call('storage:link');
    return '<h1>Storage link Success</h1>';
});





