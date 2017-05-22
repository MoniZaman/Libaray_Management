<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\User;




Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    //For Category
    Route::get('/home/manage_category',['middleware' => 'auth', function () {
    	if (Auth::check()) {
     return view('custom_view.manage_category');
		}
   		return redirect('/');
	}]);

    Route::get('/home/add_category',['middleware' => 'auth',  function () {
    return view('custom_view.add_category');
	}]);
    //For Categorylist store ,edit, update and delete
    Route::post('/home/categorylist/store', ['middleware' => 'auth','uses'=>'CategoryController@store']);
    Route::get('/home/categorylist_edit/{id}',['middleware' => 'auth', 'uses'=>'CategoryController@edit']);
    Route::post('/home/categorylist/update',['middleware' => 'auth', 'uses'=>'CategoryController@update']);
    Route::get('/home/categorylist_delete/{id}',['middleware' => 'auth', 'uses'=>'CategoryController@delete']);

    //For Author===================================
	Route::get('/home/manage_author',['middleware' => 'auth', function () {
    return view('custom_view.manage_author');
	}]);

    Route::get('/home/add_author',['middleware' => 'auth', function () {
    return view('custom_view.add_author');
	}]);

    //For Author store ,edit, update and delete
    Route::post('/home/authorlist/store',['middleware' => 'auth', 'uses'=>'AuthorController@store']);   
    Route::get('/home/author_edit/{id}',['middleware' => 'auth', 'uses'=>'AuthorController@edit']);
    Route::post('/home/authorlist/update',['middleware' => 'auth', 'uses'=>'AuthorController@update']);
    Route::get('/home/author_delete/{id}',['middleware' => 'auth', 'uses'=>'AuthorController@delete']);

    //For Product
    Route::get('/home/manage_book',['middleware' => 'auth', function () {
    return view('custom_view.manage_book');
	}]);

    Route::get('/home/add_book',['middleware' => 'auth', function () {
    return view('custom_view.add_book');
	}]);
    
    //For BookList store ,edit, update and delete
    Route::post('/home/booklist/store',['middleware' => 'auth', 'uses'=>'BookController@store']);
    Route::get('/home/booklist_edit/{id}',['middleware' => 'auth', 'uses'=>'BookController@edit']);
    Route::post('/home/booklist/update',['middleware' => 'auth', 'uses'=>'BookController@update']);
    Route::get('/home/booklist_delete/{id}',['middleware' => 'auth', 'uses'=>'BookController@delete']);

    //For Book Issue 
    Route::get('/home/manage_book_issue',['middleware' => 'auth', function () {
    return view('custom_view.manage_book_issue');
	}]);

    Route::get('/home/add_book_issue',['middleware' => 'auth', function () {
    return view('custom_view.add_book_issue');
	}]);
    Route::post('/home/book_issue_submit/store',['middleware' => 'auth', 'uses'=>'BookIssueController@book_issue_submit']);





    Route::post('/home/add_book_search',['middleware' => 'auth', 'uses'=>'BookController@search']);
    //For BookList store ,edit, update and delete

    Route::post('/home/book_issue/store',['middleware' => 'auth', 'uses'=>'BookIssueController@store']);
    Route::get('/home/book_issue_list_edit/{id}',['middleware' => 'auth', 'uses'=>'BookIssueController@edit']);
    Route::post('/home/book_issue_list/update',['middleware' => 'auth', 'uses'=>'BookIssueController@update']);
    Route::get('/home/book_issue_list_delete/{id}',['middleware' => 'auth', 'uses'=>'BookIssueController@delete']);
    Route::get('/home/book_issue_list_submit/{id}',['middleware' => 'auth', 'uses'=>'BookIssueController@submit']);
    Route::post('/home/book_issue_submit/update',['middleware' => 'auth', 'uses'=>'BookIssueController@book_submited']);


    
    Route::get('/home', 'HomeController@index');


});
