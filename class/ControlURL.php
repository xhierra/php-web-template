<?php

Class ControlURL{


    public static $_page = "Active";
	public static $_folder = Web_Body;
    public static $_params = array();
    
    public static function getParam($par) {
		return isset($_GET[$par]) && $_GET[$par] != "" ?
				$_GET[$par] : null;
	}
	

	public static function cPage() {
        if(isset($_GET[self::$_page])){
            return $_GET[self::$_page];
        }else{
			return 'index';
			
        }
    }

    
    public static function getPage() {
		$page = self::$_folder.DS.self::cPage().".php";
        $error = self::$_folder.DS."error.php";
        if(is_file($page)){
            return $page;
        }else{
            return $error;
        }
	}
	
	

	
    
}