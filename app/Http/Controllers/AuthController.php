<?php

namespace InterComm\Http\Controllers;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use InterComm\Http\Requests;
use InterComm\Http\Controllers\Controller;
use Auth;
use InterComm\GoogleAuthentication;
use View;
use Redirect;

class AuthController extends Controller
{

	// ------------------------------------------------------------------------
    public function login(GoogleAuthentication $googleAuth, Request $request)
    {
    	$auth_url = $googleAuth->getAuthUrl();
        return View::make('auth.login', ['auth_url'=>$auth_url]);
    }	

    public function auth(GoogleAuthentication $googleAuth, Request $request)
    {
        return redirect()->away($googleAuth->getAuthUrl());
    }

    // ------------------------------------------------------------------------
    public function logout()
    {
    	Auth::logout();
    	return redirect('login');
    }

    // ------------------------------------------------------------------------
    public function oauth2callback(GoogleAuthentication $googleAuth, Request $request)
    {
		return $googleAuth->oauth2callback($request);
    }
}
