<?php

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

Route::group(['prefix'=>'admin', 'middleware' => ['web']], function() {
    Route::get('invoices/{invoice}/email', 'InvoiceController@sendByEmail');
    Route::get('invoices/{invoice}/download', 'InvoiceController@download');
    Route::resource('invoices', 'InvoiceController');
});

Route::get('invoice/generate', 'InvoiceController@generateInvoice');

