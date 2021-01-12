<?php
class Core {
	
	public function run() {
		ob_start();
		require_once(ControlURL::getPage());
		ob_get_flush();
	}

}