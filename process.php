<?php
    ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	session_start();
	set_include_path(get_include_path().PATH_SEPARATOR."assets/libs".PATH_SEPARATOR."assets/config".PATH_SEPARATOR."assets/model");
	spl_autoload_register();
	header("Content-Type: text/html; charset=utf-8");
	$request = new Request();	
	// connect to database 
	AbstractModel::setDB(Database::getDB());

	if ($request->isPost()) {
		$userdata = new UserData();
		$userdata->page_url = $request->src;
		if ($userdata->handle()) {
			echo "true";
		} else {
			echo "false";
		}
		exit;
	}