<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;





/////////////visitor////////

Route::group(['prefix' => 'visit', 'as' => 'visits.'], function () {
    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\VisitController@create']);
        Route::post('/', ['as' => 'store', 'uses' => '\App\Http\Controllers\Admin\VisitController@store']);
    });
    //edit / update
    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('visit/{visit?}', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\VisitController@edit']);
        Route::post('visit/{visit?}', ['as' => 'update', 'uses' => '\App\Http\Controllers\Admin\VisitController@update']);
    });
    //show visits
    Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\Admin\VisitController@index']);
        Route::get('data', ['as' => 'data', 'uses' => '\App\Http\Controllers\Admin\VisitController@data']); //.data
    });

    Route::get('/{visit?}', ['as' => 'delete', 'uses' => '\App\Http\Controllers\Admin\VisitController@delete']);
});
