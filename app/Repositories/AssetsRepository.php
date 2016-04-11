<?php 

namespace InterComm\Repositories;

use Carbon\Carbon;
use DB;
use \Illuminate\Support\Collection as Collection;
use Input;
use Paginator;
use InterComm\User;
use InterComm\Asset;

class AssetsRepository  {
	
	private $listener;

	// ------------------------------------------------------------------------
	public function __construct() {
		
	}

	// ------------------------------------------------------------------------
	public function setListener($listener) {
		$this->listener = $listener;
	}

	// ------------------------------------------------------------------------
	public function get($id) {
		
		if(is_object($id)) {
			$id = $id->id;
		}
		return Asset::whereId($id)->first();
	}

	// ------------------------------------------------------------------------
	public function getWithUID($uid) {
		return Asset::where('uid', '=', $uid)->first();
	}

	// ------------------------------------------------------------------------
	public function find($id) {
		
		return $this->listener->statusResponse(['asset'=>$this->get($id)]);		
	}

	// ------------------------------------------------------------------------
	public function store()
	{		
		return $this->listener->statusResponse(['asset'=>$asset]);		
	}

	// ------------------------------------------------------------------------
	public function delete($id) 
	{
		$asset = $this->get($id);
		return $this->listener->statusResponse(['asset'=>$asset]);
	}
}