<?php

Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {


    //visitors routes

    //login & register

    Route::post('users/login', 'LoginController@login');
    Route::post('users/register', 'RegisterController@register');

    //videos


    Route::get('videos', 'VideosController@index');
    Route::get('videos/{id}', 'VideosController@show');

    //categories

    Route::get('categories', 'CategoriesController@index');
    Route::get('categories/{id}', 'CategoriesController@show');

    //skills

    Route::get('skills', 'SkillsController@index');
    Route::get('skills/{id}', 'SkillsController@show');

    //tag
    Route::get('tags/{id}', 'TagsController@show');


    //comments -> add, edit, delete
    Route::group(['middleware' => 'auth:api'], function () {


        Route::post('comments/create/{id}', 'CommentsController@store');

        Route::post('comments/{id}', 'CommentsController@update');

        Route::get('comments/delete/{id}', 'CommentsController@delete');

    });
});

