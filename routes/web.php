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

Route::post('/login', 'AccountController@login')->name('login');
Route::get('/logout', 'AccountController@logout')->name('logout');
Route::get('/register', 'AccountController@register')->name('register');
Route::post('/register', 'AccountController@registerUser');
Route::get('/api/autocomplete/{searchFilter}', 'AccountController@autocomplete');

Route::get('/borrow/{id}', 'BorrowersController@borrowBook')->name('borrow');
Route::get('/borrowed', 'BorrowersController@borrowedBooks')->name('borrowed');
Route::get('/return/{id}', 'BorrowersController@returnBook')->name('return');

Route::resource('books', 'BooksController');
Route::get('/', 'BooksController@index')->name('home');
Route::get('/search', 'BooksController@search')->name('books.search');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/searchAll', 'AdminController@search')->name('admin.search');
