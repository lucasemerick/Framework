<?php

define('CONTROLLERS', 'application/controllers/');
define('VIEWS', 'application/views/');
define('MODELS', 'application/models/');
define('HELPERS', 'system/helpers/');

function __autoload($file) {
    if (file_exists(MODELS . $file . '.php')) {
        require_once( MODELS . $file . '.php');
    } else if (file_exists(HELPERS . $file . '.php')) {
        require_once( HELPERS . $file . '.php');
    } else {
        die('ERRO: Model ou Helper nao existe!');
    }
}

require_once('system/loader.php');
require_once('system/core.php');
require_once('system/controller.php');
require_once('system/model.php');

$core = new Core;
