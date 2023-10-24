<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/test', 'HomeController@test');
Route::get('/home', 'HomeController@index')->name('home');

//==== Admin routes =====
Route::group(['prefix'=>'admin', 'middleware'=>'auth'],function(){
  Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
  Route::get('/matapilih', 'AdminController@matapilih')->name('admin.matapilih');

  //post
  Route::get('/post/create', 'AdminController@post_create')->name('admin.post/create');
  Route::post('/post/store', 'AdminController@post_store')->name('admin.post/store');
  Route::get('/post/edit/{id}', 'AdminController@post_edit')->name('admin.post/edit');
  Route::post('/post/update/{id}', 'AdminController@post_update')->name('admin.post/update');
  Route::get('/post/trash/{id}', 'AdminController@post_trash')->name('admin.post/trash');
  Route::get('/post/trashed/', 'AdminController@post_trashed')->name('admin.post/trashed');
  Route::get('/post/restore/{id}', 'AdminController@post_restore')->name('admin.post/restore');
  Route::get('/post/forcedelete/{id}', 'AdminController@post_forcedelete')->name('admin.post/forcedelete');
  //matapilih
  Route::get('/matapilih/create', 'AdminController@matapilih_create')->name('admin.matapilih/create');
  Route::post('/matapilih/store', 'AdminController@matapilih_store')->name('admin.matapilih/store');
  Route::get('/matapilih/edit/{id}', 'AdminController@matapilih_edit')->name('admin.matapilih/edit');
  Route::post('/matapilih/update/{id}', 'AdminController@matapilih_update')->name('admin.matapilih/update');
  Route::get('/matapilih/trash/{id}', 'AdminController@matapilih_trash')->name('admin.matapilih/trash');
  Route::get('/matapilih/trashed/', 'AdminController@matapilih_trashed')->name('admin.matapilih/trashed');
  Route::get('/matapilih/restore/{id}', 'AdminController@matapilih_restore')->name('admin.matapilih/restore');
  Route::get('/matapilih/forcedelete/{id}', 'AdminController@matapilih_forcedelete')->name('admin.matapilih/forcedelete');
  //category
  Route::get('/category', 'CategoryController@category')->name('admin.category');
  Route::get('/category/create', 'CategoryController@category_create')->name('admin.category/create');
  Route::post('/category/store', 'CategoryController@category_store')->name('admin.category/store');
  Route::get('/category/edit/{id}', 'CategoryController@category_edit')->name('admin.category/edit');
  Route::post('/category/update/{id}', 'CategoryController@category_update')->name('admin.category/update');
  Route::get('/category/delete/{id}', 'CategoryController@category_delete')->name('admin.category/delete');
  //tag
  Route::get('/tag', 'AdminController@tag')->name('admin.tag');
  Route::get('/tag/create', 'AdminController@tag_create')->name('admin.tag/create');
  Route::post('/tag/store', 'AdminController@tag_store')->name('admin.tag/store');
  Route::get('/tag/edit/{id}', 'AdminController@tag_edit')->name('admin.tag/edit');
  Route::post('/tag/update/{id}', 'AdminController@tag_update')->name('admin.tag/update');
  Route::get('/tag/delete/{id}', 'AdminController@tag_delete')->name('admin.tag/delete');
});


//==== Post routes ====


//==== User routes ====
