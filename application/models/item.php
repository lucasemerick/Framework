<?php

class Item extends Model{

	protected $tabela = 'itens';
	protected $one_to_one = array('pedido','produto');
	#protected $one_to_many = array();
	#protected $many_to_many = array();

	public function __construct(){
		parent::__construct();
	}
}