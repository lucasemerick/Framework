<?php

class Produto extends Model {

    protected $tabela = 'produtos';
    protected $one_to_one = array('fornecedor', 'categoria');

    #protected $one_to_many = array();
    #protected $many_to_many = array();

    public function __construct() {
        parent::__construct();
    }

    public function __destruct() {
        
    }

    public function buscarPorCodRecursive($valor = '') {
        $produto = new Produto();
        $produto->getById($valor);
        $dados = $produto->recursiveGet();
        return $dados;
    }

    public function buscarPorCod($coluna = '', $valor = '') {
        $produto = new Produto();
        $produto->where($coluna, $valor);
        if ($produto->get()) {
            return $dados = $produto->to_array();
        } else {
            return FALSE;
        }
    }

    public function buscarTodos() {
        $produto = new Produto();
        if ($produto->get()) {
            return $dados = $produto->all_to_array();
        } else {
            return FALSE;
        }
    }

    public function inserir($dados) {
        $produto = new Produto();
        foreach ($dados as $coluna => $valor) {
            $produto->$coluna = $valor;
        }
        if ($produto->save()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function atualizar($obj, $where) {
        $produto = new Produto();
        foreach ($obj as $coluna => $valor) {
            $produto->$coluna = $valor;
        }
        $produto->where($where[0], $where[1]);
        $produto->update();
    }

    public function excluir($id) {
        $produto = new Produto();
        $produto->deleteById($id);
    }

    public function pesquisar($valor) {
        $obj = array('id', 'descricao', 'fornecedor_id', 'categoria_id', 'quantidade', 'valor');
        $dados = '';
        for ($indice = 0; $indice < 6; $indice++) {
            $produto = new Produto();
            $produto->where($obj[$indice], $valor['valor']);
            if ($produto->get()) {
                $dados = $produto->all_to_array();
                return $dados;
            }
        }
        return FALSE;
    }

}
