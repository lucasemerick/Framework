<?php

class Core {

    private $_url;
    private $_explode;
    public $_controller;
    public $_action;
    public $_params;

    public function __construct() {
        $this->setUrl();
        $this->setExplode();
        $this->setController();
        $this->setAction();
        $this->setParams();
        $this->run();
    }

    private function setUrl() {
        $this->_url = (isset($_GET['key']) ? $_GET['key'] . '/' : 'app/index');
    }

    private function setExplode() {
        $this->_explode = explode('/', $this->_url);
    }

    private function setController() {
        $this->_controller = $this->_explode[0];
    }

    private function setAction() {
        $this->_action = (!isset($this->_explode[1]) || $this->_explode[1] == null) ? 'index' : $this->_explode[1];
    }

    private function setParams() {
        $num_params = 5;
        $temp = array_slice($this->_explode, 2);
        for ($i = 0; $i < $num_params; $i++) {
            $this->_params[] = isset($temp[$i]) ? $temp[$i] : null;
        }
    }

    public function getParams($name = NULL) {
        if ($name != NULL) {
            if (array_key_exists($name, $this->_params)) {
                return $this->_params[$name];
            } else {
                return false;
            }
        } else {
            return $this->_params;
        }
    }

    public function run() {
        #Caminho do local do arquivo controller.
        $controller_path = CONTROLLERS . $this->_controller . '.php';
        #Tratamento de erro.
        if (!file_exists($controller_path)) {
            die('ERRO: Controle nao existe!');
        }
        require_once($controller_path);

        $app = new $this->_controller();

        #Tratamento de erro.
        if (!method_exists($app, $this->_action)) {
            die('ERRO: Action nao existe!');
        }
        $action = $this->_action;
        $app->$action($this->_params[0], $this->_params[1], $this->_params[2], $this->_params[3], $this->_params[4]);
    }

}

?>