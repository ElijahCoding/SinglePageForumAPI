<?php

Route::group(['middleware' => ['api']], function() {
  Route::post('/auth/signup', [
    'uses' => 'AuthController@signUp'
  ]);

  Route::post('/auth/signin', [
    'uses' => 'AuthController@signIn'
  ]);
});
