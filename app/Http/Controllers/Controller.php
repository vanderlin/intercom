<?php

namespace InterComm\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth;
abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;
    protected $is_signed_in;
    protected $user;

    function __construct() {
    	$this->is_signed_in = Auth::check();
    	$this->user = Auth::user();
        
        view()->share('is_signed_in', $this->is_signed_in);
        view()->share('user', $this->user);

    }
}
