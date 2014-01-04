<?php

namespace Noodle50\Activity;

use Illuminate\Support\ServiceProvider;

class ActivityServiceProvider extends ServiceProvider {

	protected $defer = false;

	public function boot() {
		$this->package('Noodle50/activity');
	}

	public function register() {}

	public function provides() {}

}