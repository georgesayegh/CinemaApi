<?php
/*
 * Default page
 */
Route::any('/', function() { return Redirect::to('users/auth'); });

/*
 * Users routes
 */
Route::any('users', function() { return Redirect::to('users/auth'); });
Route::any('users/auth', 'UsersController@auth');

