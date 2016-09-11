<?php

class Pedido extends Model {

    protected $tabela = 'pedidos';
    protected $one_to_one = array('funcionario', 'cliente');
    protected $one_to_many = array('item');

    #protected $many_to_many = array();

    public function __construct() {
        parent::__construct();
    }

    public function __destruct() {
        
    }

    public function buscarTodos() {
        $pedido = new Pedido();
        if ($pedido->get()) {
            return $dados = $pedido->all_to_array();
        } else {
            return FALSE;
        }
    }

    public function inserir($dados) {
        $pedido = new Pedido();
        foreach ($dados as $coluna => $valor) {
            $pedido->$coluna = $valor;
        }
        if ($pedido->save()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function excluir($id) {
        $pedido = new Pedido();
        $pedido->deleteById($id);
    }

    public function maxId() {
        $pedido = new Pedido();
        $pedido->select(array('max(id)'));
        if ($pedido->get()) {
            return $dados = $pedido->to_array();
        } else {
            return FALSE;
        }
    }

}
