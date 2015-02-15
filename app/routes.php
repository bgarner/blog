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
/login
/my_comments --list all of your comments
/my_comments/{id}/edit  -- edit/delete a specific comment

****backend routes
/admin  (login)  -- restrict to authors/admin
/admin/users
/admin/users/create

/admin/posts  -- show post and comments (show author posts OR all if admin)
/admin/posts/new
/admin/posts/{id}/edit

/admin/comments/{id}/edit

*/
