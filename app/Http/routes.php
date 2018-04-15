<?php

Route::group(['middleware' => ['api']], function() {
  Route::post('/auth/signup', [
    'uses' => 'AuthController@signUp'
  ]);

  Route::post('/auth/signin', [
    'uses' => 'AuthController@signIn'
  ]);

  Route::get('/sections', [
    'uses' => 'Forum\SectionController@index'
  ]);

  Route::get('/topic', [
    'uses' => 'Forum\TopicController@index'
  ]);

  Route::get('/topic/{topic}', [
    'uses' => 'Forum\TopicController@show'
  ]);


  Route::group(['middleware' => 'jwt.auth'], function() {
    Route::get('/test', function() {
      dd('You are authenticated');
    });

    Route::get('/user', [
      'uses' => 'UserController@index'
    ]);

    Route::post('topic', [
      'uses' => 'Forum\TopicController@store'
    ]);
  });
});
