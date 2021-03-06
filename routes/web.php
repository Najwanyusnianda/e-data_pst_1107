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

  
    Route::get('/algolia-import', function() {
    $status = Artisan::call('scout:import');
    return redirect()->back()->with('import_algolia','Berhasil di import');
    })->name('algolia.import');

    Route::name('user.')->group(function () {
      Route::get('/user_management/index', 'UserController@index')->name('index');
      Route::get('/user_management/create', 'UserController@create')->name('create');
      Route::post('/user_management/store', 'UserController@store')->name('store');
      Route::get('/user_management/update/{user_id}', 'UserController@update')->name('update');
      Route::post('/user_management/updateStore/{user_id}', 'UserController@updateStore')->name('storeUpdate');
      Route::get('/user_management/delete/{user_id}', 'UserController@delete')->name('delete');
    });

    Route::get('backend', function () {
        return redirect()->route('admin.dashboard_index');
    });
    Route::name('admin.')->group(function () {
        //Publikasi
        Route::get('backend/dashboard','DashboardController@index')->name('dashboard_index');
        Route::get('backend/publikasi','PublikasiController@index')->name('publikasi_index');
        Route::get('backend/publikasi/{pub_id}/update_','PublikasiController@updateIndex')->name('publikasi_updateIndex');
        Route::get('backend/publikasi/publikasi_table_detail/{id}','PublikasiController@publicationTableDetail')->name('pubTable.detail');
        Route::post('backend/publikasi/post','PublikasiController@postPublikasi')->name('pubCollection.store');
        Route::get('backend/table/publikasi','PublikasiController@publicationListTable')->name('pubCollection.table');
        Route::post('backend/publikasi/{id}/post/n_bab','PublikasiController@storeJumlahBab')->name('pubCollection.n_bab.store');
        Route::post('backend/delete/publikasi','PublikasiController@deletePublikasi')->name('publikasi.delete');
        Route::post('backend/update/publikasi/{pub_id}','PublikasiController@updatePublikasi')->name('publikasi.update');
        
        //lainnya
        Route::get('backend/lainnya/index','TableLainnyaController@index')->name('lainnya.index');
        Route::get('backend/lainnya/detail/{lainnya_id}','TableLainnyaController@detailLainnya')->name('lainnya.detail');
        Route::get('backend/lainnya/add_form','TableLainnyaController@create')->name('lainnya.create');
        Route::get('backend/lainnya/{lainnya_id}/update_form','TableLainnyaController@update')->name('lainnya.update');
        
        //post
        Route::post('backend/lainnya/store_table','TableLainnyaController@store')->name('lainnya.store');
        Route::post('backend/lainnya/{lainnya_id}/update_table','TableLainnyaController@storeUpdate')->name('lainnya.storeUpdate');
        Route::post('backend/lainnya/{lainnya_id}/delete','TableLainnyaController@delete')->name('lainnya.delete');

        ////service for lainnya
        Route::get('backend/lainnya/table/index','TableLainnyaController@lainnyaTable')->name('publainnyaCollection.table');



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
        Route::post('backend/pub_table/delete/{pubtable_id}','PubTableController@delete')->name('pubTable_delete'); 
        Route::post('backend/pub_table/getListTableByBab/index/{pub_id}','PubTableController@changeBabPubTableEvent')
        ->name('pubTableCollection.pubTableList');
        Route::get('backend/pub_table/getListTableByBab/index/{pub_id}','PubTableController@changeBabPubTableEvent')
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
    Route::get('search_data','HomeController@dataSearchIndex')->name('home.data');
    //Route::get('/search_pub','HomeController@pubSearchIndex')->name('home.pub');
    Route::get('/faq','HomeController@faqIndex')->name('faq');

    #### search data $$$

    Route::get('search_data/{subject_id}/subject_index','SearchEngineController@subject_detail')->name('subject_detail');
    Route::get('search_data/result?={keyword}','SearchEngineController@search_result_index')->name('seach_index');
    Route::post('/search/post','SearchEngineController@post_search')->name('seach_post');
    Route::get('/search_data/post/new','SearchEngineController@new_search')->name('seach_post_new');


    #### search publikasi $$$
    Route::get('search_pub/index','PubSearchController@indexApi')->name('pub.search_index');
    Route::post('search_pub/index','PubSearchController@indexApi')->name('pub.search_index');
   // Route::get('search_pub/index','PubSearchController@index')->name('pub.search_index');

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

//

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





