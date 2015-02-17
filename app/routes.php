<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'BlogController@index');

Route::get('/read/{id?}', 'BlogController@read');

Route::get('/authors', 'BlogController@authors');
Route::get('/author/{id?}', 'BlogController@authorProfile');

Route::post('/addcomment', 'CommentController@addComment');

Route::get('/notallowed', function()
{
	return View::make('notallowed');
});


Route::when('admin/*', 'auth');
Route::get('/admin', 'AdminController@showAdminLogin');
Route::post('/admin', 'BaseController@doLogin');

//posts
Route::get('/admin/posts', 'BlogPostController@index'); //can delete from this view
Route::get('/admin/post/{postid?}', 'BlogPostController@show');  //view a single post
Route::get('/admin/posts/new', 'BlogPostController@create');
Route::post('/admin/posts/new', 'BlogPostController@save');
Route::get('/admin/post/{postid?}/edit', 'BlogPostController@edit');

//comments
Route::get('/admin/comments', 'CommentController@getLatest'); //can delete from this view
Route::get('/admin/post/{postid?}/comments', 'CommentController@showComments'); //can delete from this view
Route::get('/admin/post/{postid?}/comment/{commentid?}/edit', 'CommentController@editComment'); //edit comment

//users
Route::get('/admin/users', 'UserController@showUsers');
Route::get('/admin/user/{userid?}', 'UserController@viewUser');
Route::get('/admin/user/comments/{userid?}', 'UserController@viewUserComments');
Route::get('/admin/user/posts/{userid?}', 'UserController@viewUserPosts');
Route::get('/admin/user/new', 'UserController@newUser');
Route::get('/admin/user/{userid?}/edit', 'UserController@editUser');

//commenter login/out
Route::get('/login', array('uses' => 'BaseController@showLogin'));
Route::post('/login', array('uses' => 'BaseController@doLogin'));
Route::get('/logout', array('uses' => 'BaseController@doLogout'));
//Route::controller('/password', 'RemindersController');


// Route::get('/', function()
// {
// 	return View::make('');
// });

/*
/post/{id}

****fontend routes
/my_comments --list all of your comments
/my_comments/{id}/edit  -- edit/delete a specific comment


*/
