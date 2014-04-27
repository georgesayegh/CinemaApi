<?php
/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/
App::before(function($request)
{
    Route::group(array('before' => 'auth'), function()
    {
        /*
        * Cinemas routes
        */
        Route::any('cinemas', 'CinemasController@index');
        Route::any('cinemas/add', 'CinemasController@add');
        Route::any('cinemas/{id}/edit', 'CinemasController@edit');
        Route::any('cinemas/{id}/delete', 'CinemasController@delete');
        Route::any('cinemas/{id}', 'CinemasController@getOne');
        
        /*
         * Movies routes
         */
        Route::any('movies', 'MoviesController@index');
        Route::any('movies/add', 'MoviesController@add');
        Route::any('movies/{id}/edit', 'MoviesController@edit');
        Route::any('movies/{id}/delete', 'MoviesController@delete');
        Route::any('movies/{id}', 'MoviesController@getOne');

        /*
         * MovieSessions routes
         */
        Route::any('movie-sessions', 'MovieSessionsController@index');
        Route::any('movie-sessions/add', 'MovieSessionsController@add');
        Route::any('movie-sessions/{id}/edit', 'MovieSessionsController@edit');
        Route::any('movie-sessions/{id}/delete', 'MovieSessionsController@delete');
        Route::any('movie-sessions/{id}', 'MovieSessionsController@getOne');
    });
});

App::after(function($request, $response)
{
    //
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/
Route::filter('auth', function()
{
    if (Auth::guest()) return Redirect::guest('users/auth');
});

Route::filter('auth.basic', function()
{
    return Auth::basic('username');
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/
Route::filter('guest', function()
{
    if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/
Route::filter('csrf', function()
{
    if (Session::token() != Input::get('_token'))
    {
        throw new Illuminate\Session\TokenMismatchException;
    }
});
