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

Route::namespace('Dribbble')->group(function () {
    Route::prefix('dribbble')->group(function () {
        Route::prefix('contents')->group(function () {

            // GET dribbble/contents/popular
            Route::get('/popular', 'ContentController@popular');
    
            // GET dribbble/contents/recent
            Route::get('/recent', 'ContentController@recent');
        
            // GET dribbble/contents/:id
            Route::get('/{id}', 'ContentController@show')
                ->where('id', '[0-9]+');
        });
    });
});