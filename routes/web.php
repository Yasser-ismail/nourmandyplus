<?php

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


Route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function () {

    //Dashboard

    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::get('/comment/delete/{id}', 'HomeController@commentdelete')->name('dashboard.comment');

    //users curd
    Route::resource('users', 'UsersController')->except(['show']);
//    Route::get('users', 'UsersController@index');
//    Route::get('users/create', 'UsersController@create');
//    Route::post('users', 'UsersController@store');
//    Route::get('users/{id}', 'UsersController@edit');
//    Route::post('users/{id}', 'UsersController@update');
//    Route::get('users/delete/{id}', 'UsersController@destroy');

    //categories curd
    Route::resource('categories', 'CategoriesController')->except(['show']);

    //skills curd
    Route::resource('skills', 'SkillsController')->except(['show']);

    //tags Crud
    Route::resource('tags', 'TagsController')->except(['show']);

    //Pages Curd
    Route::resource('pages', 'PagesController')->except(['show']);

    //Videos Curd
    Route::resource('videos', 'VideosController')->except(['show']);

    //comments curd
    Route::post('comments', 'VideosController@storecomments')->name('comments.store');
    Route::get('comments/delete/{id}', 'VideosController@deletecomment')->name('comments.destroy');
    Route::get('comments/update/{id}', 'VideosController@updatecomment')->name('comments.update');

    //Messages Curd
    Route::resource('messages', 'MessagesController')->only('index', 'edit', 'destroy');

    //Message Replay

    Route::post('reply/contact', 'MessagesController@replycontact')->name('message.replay');

});


//visitors

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category/{id}', 'HomeController@category')->name('front.category');
Route::get('/skill/{id}', 'HomeController@skill')->name('front.skill');
Route::get('/tag/{id}', 'HomeController@tag')->name('front.tag');
Route::get('/video/{slug}', 'HomeController@video')->name('front.video');
Route::post('contact-us', 'HomeController@storemessage')->name('store.message');
Route::get('/', 'HomeController@welcome')->name('landing.web');
Route::get('/page/{slug}', 'HomeController@page')->name('front.page');
Route::get('/profile/{slug}', 'HomeController@profile')->name('front.profile');





Auth::routes();

//users only

Route::middleware('auth')->group(function () {
    Route::post('/comment/{id}', 'HomeController@commentedit')->name('front.comment.edit');
    Route::get('/comment/{id}', 'HomeController@commentdelete')->name('front.comment.delete');
    Route::post('/Comment', 'HomeController@commentadd')->name('front.comment.add');
    Route::post('/profile', 'HomeController@profileupdate')->name('profile.update');
});
