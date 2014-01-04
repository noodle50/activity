<?php

namespace Noodle50\Activity;

use Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class Activity extends Eloquent {

	protected $table = 'user_activity';

	public function user() {
		return $this->belongsTo(Config::get('auth.model'), 'user_id');
	}

	public static function add($data = array()) {
		$user = Auth::user();
		
		$entry = new static;
		$entry->user_id = (isset($user->id) ? $user->id : false);
		$entry->ip_address = Request::getClientIp();
		$entry->data = (isset($data['data']) ? json_encode($data['data']) : null);
		
		foreach (array('group', 'type', 'action') as $field) {
			$entry->$field = (isset($data[$field]) ? $data[$field] : null);
		}

		return (bool)$entry->save();
	}

}