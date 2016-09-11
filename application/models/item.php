<?php

class Item extends Model {

    protected $tabela = 'itens';
    protected $one_to_one = array('pedido', 'produto');

    #protected $one_to_many = array();
    #protected $many_to_many = array();

    public function __construct() {
        parent::__construct();
    }

    public function __destruct() {
        
    }

    public function buscarPorCodRecursive($valor = '') {
        $item = new Item();
        $item->getById($valor);
        $dados = $item->recursiveGet();
        return $dados;
    }

    public function buscarPorCod($coluna = '', $valor = '') {
        $item = new Item();
        $item->where($coluna, $valor);
        if ($item->get()) {
            return $dados = $item->to_array();
        } else {
            return FALSE;
        }
    }

    public function buscarTodos() {
        $item = new Item();
        if ($item->get()) {
            return $dados = $item->all_to_array();
        } else {
            return FALSE;
        }
    }

    public function inserir($pedido, $dados) {
        foreach ($dados as $coluna => $valor) {
        }
        return FALSE;
    }

    public function atualizar($obj, $where) {
        $item = new Item();
        foreach ($obj as $coluna => $valor) {
            $item->$coluna = $valor;
        }
        $item->where($where[0], $where[1]);
        $item->update();
    }

    public function excluir($id) {
        $item = new Item();
        $item->deleteById($id);
    }

}
