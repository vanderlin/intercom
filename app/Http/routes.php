<?php

use GrahamCampbell\Flysystem\FlysystemManager;
use Illuminate\Http\Request;
use InterComm\Http\Requests;

Route::get('/', ['middleware'=>'auth.session', function() {
	return view('com');
}]);
Route::get('php-info', function() {
	phpinfo();
});
