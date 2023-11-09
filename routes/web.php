<?php

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

// Route::get('/test', 'HomeController@test');
Route::get('/home', 'HomeController@index')->name('home');




//==== Admin routes =====
Route::group(['prefix'=>'admin', 'middleware'=>'auth'],function(){
  Route::middleware(['checkUserAccessSuperAdmin'])->group(function () {
    // Rute yang hanya dapat diakses oleh super admin
    // Tempatkan rute Anda di sini
    Route::post('/matapilih/niksearch','AdminController@showNIK')->name('admin.niksearch');
    Route::get('/matapilih/list', 'AdminController@getMatapilih')->name('admin.matapilih.list');
    Route::get('/matapilih/create', 'AdminController@matapilih_create')->name('admin.matapilih/create');
    Route::get('/matapilih/create-manual', 'AdminController@matapilih_create_manual')->name('admin.matapilih/create-manual');
    Route::post('/matapilih/store', 'AdminController@matapilih_store')->name('admin.matapilih/store');
    Route::get('/matapilih/edit/{id}', 'AdminController@matapilih_edit')->name('admin.matapilih/edit');
    Route::post('/matapilih/update/{id}', 'AdminController@matapilih_update')->name('admin.matapilih/update');
    Route::get('/matapilih/trash/{id}', 'AdminController@matapilih_trash')->name('admin.matapilih/trash');
    Route::get('/matapilih/trashed/', 'AdminController@matapilih_trashed')->name('admin.matapilih/trashed');
    Route::get('/matapilih/restore/{id}', 'AdminController@matapilih_restore')->name('admin.matapilih/restore');
    Route::get('/matapilih/forcedelete/{id}', 'AdminController@matapilih_forcedelete')->name('admin.matapilih/forcedelete');

    Route::get('/category/list', 'CategoryController@getCategories')->name('admin.category.list');
    Route::get('/category/create', 'CategoryController@category_create')->name('admin.category/create');
    Route::post('/category/store', 'CategoryController@category_store')->name('admin.category/store');
    Route::get('/category/edit/{id}', 'CategoryController@category_edit')->name('admin.category/edit');
    Route::post('/category/update/{id}', 'CategoryController@category_update')->name('admin.category/update');
    Route::get('/category/delete/{id}', 'CategoryController@category_delete')->name('admin.category/delete');

    Route::get('/koordinator/create', 'KoordinatorController@koordinator_create')->name('admin.koordinator/create');
    Route::post('/koordinator/store', 'KoordinatorController@koordinator_store')->name('admin.koordinator/store');
    Route::get('/koordinator/edit/{id}', 'KoordinatorController@koordinator_edit')->name('admin.koordinator/edit');
    Route::post('/koordinator/update/{id}', 'KoordinatorController@koordinator_update')->name('admin.koordinator/update');
    Route::get('/koordinator/delete/{id}', 'KoordinatorController@koordinator_delete')->name('admin.koordinator/delete');

    Route::get('/user/create', 'UserController@user_create')->name('admin.user/create');
    Route::post('/user/store', 'UserController@user_store')->name('admin.user/store');
    Route::get('/user/edit/{id}', 'UserController@user_edit')->name('admin.user/edit');
    Route::post('/user/update/{id}', 'UserController@user_update')->name('admin.user/update');
    Route::get('/user/delete/{id}', 'UserController@user_delete')->name('admin.user/delete');

    Route::get('/tag/delete/{id}', 'AdminController@tag_delete')->name('admin.tag/delete');
    Route::get('/change-password', 'AdminController@changePassword')->name('admin.changepassword');
    Route::post('/change-password', 'AdminController@changePasswordSave')->name('admin.postChangePassword');
  });

  Route::middleware(['checkUserAccessAdmin'])->group(function () {
    Route::post('/matapilih/niksearch','AdminController@showNIK')->name('admin.niksearch');
    Route::get('/matapilih/list', 'AdminController@getMatapilih')->name('admin.matapilih.list');
    Route::get('/matapilih/create', 'AdminController@matapilih_create')->name('admin.matapilih/create');
    Route::get('/matapilih/create-manual', 'AdminController@matapilih_create_manual')->name('admin.matapilih/create-manual');
    Route::post('/matapilih/store', 'AdminController@matapilih_store')->name('admin.matapilih/store');
    Route::get('/matapilih/edit/{id}', 'AdminController@matapilih_edit')->name('admin.matapilih/edit');
    Route::post('/matapilih/update/{id}', 'AdminController@matapilih_update')->name('admin.matapilih/update');

    Route::get('/category/list', 'CategoryController@getCategories')->name('admin.category.list');
    Route::get('/category/create', 'CategoryController@category_create')->name('admin.category/create');
    Route::post('/category/store', 'CategoryController@category_store')->name('admin.category/store');
    Route::get('/category/edit/{id}', 'CategoryController@category_edit')->name('admin.category/edit');
    Route::post('/category/update/{id}', 'CategoryController@category_update')->name('admin.category/update');

    Route::get('/koordinator/create', 'KoordinatorController@koordinator_create')->name('admin.koordinator/create');
    Route::post('/koordinator/store', 'KoordinatorController@koordinator_store')->name('admin.koordinator/store');
    Route::get('/koordinator/edit/{id}', 'KoordinatorController@koordinator_edit')->name('admin.koordinator/edit');
    Route::post('/koordinator/update/{id}', 'KoordinatorController@koordinator_update')->name('admin.koordinator/update');
    Route::get('/change-password', 'AdminController@changePassword')->name('admin.changePassword');
    Route::post('/change-password', 'AdminController@changePasswordSave')->name('admin.postChangePassword');
  });

  Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
  Route::get('/cetak', 'AdminController@cetak')->name('admin.cetak');
  Route::get('/dashboard-admin', 'AdminController@dashboard_admin')->name('admin.dashboard-admin');
  Route::get('/dashboard-new', 'AdminController@dashboard_new')->name('admin.dashboard-new');
  //matapilih
  Route::get('/matapilih', 'AdminController@matapilih')->name('admin.matapilih');
  //category
  Route::get('/category', 'CategoryController@category')->name('admin.category');
  //koordinator
  Route::get('/koordinator', 'KoordinatorController@koordinator')->name('admin.koordinator');
  Route::post('/koordinator/cetaktanggal/{id}', 'KoordinatorController@cetaktanggal')->name('admin.koordinator/cetaktanggal');
  Route::get('/koordinator/cetaksemua/{id}', 'KoordinatorController@cetaksemua')->name('admin.koordinator/cetaksemua');
  //tag
  Route::get('/tag', 'AdminController@tag')->name('admin.tag');
  Route::get('/tag/create', 'AdminController@tag_create')->name('admin.tag/create');
  Route::post('/tag/store', 'AdminController@tag_store')->name('admin.tag/store');
  Route::get('/tag/edit/{id}', 'AdminController@tag_edit')->name('admin.tag/edit');
  Route::post('/tag/update/{id}', 'AdminController@tag_update')->name('admin.tag/update');
  //post
  Route::get('/post/create', 'AdminController@post_create')->name('admin.post/create');
  Route::post('/post/store', 'AdminController@post_store')->name('admin.post/store');
  Route::get('/post/edit/{id}', 'AdminController@post_edit')->name('admin.post/edit');
  Route::post('/post/update/{id}', 'AdminController@post_update')->name('admin.post/update');
  Route::get('/post/trash/{id}', 'AdminController@post_trash')->name('admin.post/trash');
  Route::get('/post/trashed/', 'AdminController@post_trashed')->name('admin.post/trashed');
  Route::get('/post/restore/{id}', 'AdminController@post_restore')->name('admin.post/restore');
  Route::get('/post/forcedelete/{id}', 'AdminController@post_forcedelete')->name('admin.post/forcedelete');
});


//==== Post routes ====


//==== User routes ====
