<?php

Route::group([], function ($ruta){
    $ruta->post('register', 'AuthController@register');
    $ruta->post('login', 'AuthController@login');
    $ruta->post('recover', 'AuthController@recover');
    $ruta->get('videos','VideoController@index');
});
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::post('logout', 'AuthController@logout');
    Route::get('videos','VideoController@index');
    Route::get('visit_videos','VisitVideoUserController@index');
    Route::post('visit_videos','VisitVideoUserController@store');
    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });
});