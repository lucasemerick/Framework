<?php

class Categoria extends Model{

	protected $tabela = 'categorias';
	#protected $one_to_one = array();
	#protected $one_to_many = array();
	#protected $many_to_many = array();

	public function __construct(){
		parent::__construct();
	}
}