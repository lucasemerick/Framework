<?php

class Cliente extends Model{

	protected $tabela = 'clientes';
	protected $one_to_one = array('endereco');
	#protected $one_to_many = array();
	#protected $many_to_many = array();

	public function __construct(){
		parent::__construct();
	}
}