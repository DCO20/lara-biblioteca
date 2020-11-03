<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Web', 'as' => 'web.'], function () {

    /** Login */
    Route::get('/', 'WebController@login')->name('login');
    Route::get('/sair', 'WebController@logout')->name('logout');
});

Route::prefix('admin')
        ->namespace('Admin')
        ->middleware('auth')
        ->group(function() {

    // Router Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    // Router User
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/create', 'UserController@create')->name('users.create');
    Route::post('/users/store', 'UserController@store')->name('users.store');
    Route::get('//users/{id}/show', 'UserController@show')->name('users.show');
    Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
    Route::post('/users/{id}/edit', 'UserController@postUpdate')->name('users.edit');
    Route::get('/users/{id}/destroy', 'UserController@destroy')->name('users.destroy');
    Route::any('users/search', 'UserController@search')->name('users.search');

    // Router Studants
    Route::any('studants/search', 'StudantController@search')->name('studants.search');
    Route::post('/studants/{id}/edit', 'StudantController@postUpdate')->name('studants.postupdate');
    Route::get('/studants/{id}/destroy', 'StudantController@destroy')->name('studants.destroy');
    Route::resource('studants', 'StudantController');

    // Router Borroweds
    Route::any('borroweds/search', 'BorrowedController@search')->name('borroweds.search');
    Route::get('borroweds/search/libros', 'BorrowedController@searchLibros')->name('borroweds.searchlibros');
    Route::get('borroweds', 'BorrowedController@index')->name('borroweds.index');
    Route::get('borroweds/create', 'BorrowedController@create')->name('borroweds.create');
    Route::post('borroweds/store', 'BorrowedController@store')->name('borroweds.store');
    Route::get('/borrowed/{id}/destroy', 'BorrowedController@destroy')->name('borroweds.destroy');

    // Router Libros
    Route::any('libros/search', 'LibroController@search')->name('libros.search');
    Route::post('/libros/{id}/edit', 'LibroController@postUpdate')->name('libros.postupdate');
    Route::get('/libro/{id}/destroy', 'LibroController@destroy')->name('libros.destroy');
    Route::resource('libros', 'LibroController');

    // Router Categories
    Route::any('categories/search', 'CategoryController@search')->name('categories.search');
    Route::get('/categories/{module}', 'CategoryController@getHome')->name('categories.home');
    Route::get('/category/{id}/delete', 'CategoryController@getDelete')->name('categories_delete');
    Route::resource('categories', 'CategoryController');
    
            
});

Auth::routes();

