<?php

class Pedido extends Model{

	protected $tabela = 'pedidos';
	protected $one_to_one = array('funcionario','cliente');
	protected $one_to_many = array('item');
	#protected $many_to_many = array();

	public function __construct(){
		parent::__construct();
	}
}