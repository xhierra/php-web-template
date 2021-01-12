<?php
if(!isset($_SESSION)) {
	session_start();
}

defined("SITE_TITLE")
	|| define("SITE_TITLE", "test website");

// site domain name with http
defined("SITE_URL")
	|| define("SITE_URL", "http://".$_SERVER['SERVER_NAME']);
	
// directory separator
defined("DS")
	|| define("DS", DIRECTORY_SEPARATOR);

// root path
defined("ROOT_PATH")
	|| define("ROOT_PATH", realpath(dirname(__FILE__) . DS."..".DS));



defined("Web_Body")
	|| define("Web_Body", "public");

defined("Web_Brain")
	|| define("Web_Brain", "class");
	
// inc folder
defined("Web_Blood")
	|| define("Web_Blood", "controller");
	

defined("Web_Eyes")
	|| define("Web_Eyes", "headerandfooter");





set_include_path(implode(PATH_SEPARATOR, array(
	realpath(ROOT_PATH.DS.Web_Blood),
	realpath(ROOT_PATH.DS.Web_Brain),
	realpath(ROOT_PATH.DS.Web_Body),
	realpath(ROOT_PATH.DS.Web_Eyes),
	get_include_path()
)));