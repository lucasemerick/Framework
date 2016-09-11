<?php

class Pedidos extends Controller {

    function __construct() {
        parent::__construct();
        $this->load->native_helper('URLHelper');
    }

    public function index() {
        $model = new Item();
        $a = 'prod1';
        $array[$a] = array('produto_id' => 2);
        $array[] = array('produto_id' => 3);
        $array[] = array('produto_id' => 34);
        print_r($array);
        extract($array);
        print_r($prod1);
    }

}
