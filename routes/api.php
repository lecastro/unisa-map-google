<?php

Route::group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function () {
    Route::apiResource('geomap', 'GeomapController');

    // Route::get('geomap', 'GeomapController@index');
});
