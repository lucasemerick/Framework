<?php 


class Loader{

	function config($file){
		if(file_exists('application/config/'.$file.'.php'))
			require_once('application/config/'.$file.'.php');
	}

	function custom_helper($file){
		if(file_exists('application/helpers/'.$file.'.php'))
			require_once('application/helpers/'.$file.'.php');
	}

	function native_helper($file){
		if(file_exists('system/helpers/'.$file.'.php'))
			require_once('system/helpers/'.$file.'.php');
	}
}
