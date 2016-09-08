<?php

class Usuarios extends Controller {

    function __construct() {
        parent::__construct();
        $this->load->native_helper('URLHelper');
    }

    public function index() {
        $this->render('usuarios/index');
    }

    public function add() {
        $this->render('usuarios/add');
    }

    public function edit() {
        $this->render('usuarios/edit');
    }

    public function delete() {
        $this->render('usuarios/delete');
    }

}
