<?php
/**
 * The application's route middleware.
 *
 * @var array
 */
protected $routeMiddleware = [
	'auth' => 'App\Http\Middleware\Authenticate',
	'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
	'guest' => 'App\Http\Middleware\RedirectIfAuthenticated',
];
