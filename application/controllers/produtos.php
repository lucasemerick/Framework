<?php

class Produtos extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        echo 'PRODUTO - INDEX';
    }

    public function novos() {
        echo 'PRODUTO - NOVOS';
    }

}
