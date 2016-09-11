<?php

class Categoria extends Model {

    protected $tabela = 'categorias';

    #protected $one_to_one = array();
    #protected $one_to_many = array();
    #protected $many_to_many = array();

    public function __construct() {
        parent::__construct();
    }

    public function __destruct() {
        
    }

    public function buscarPorCod($coluna = '', $valor = '') {
        $categoria = new Categoria();
        $categoria->where($coluna, $valor);
        if ($categoria->get()) {
            return $dados = $categoria->to_array();
        } else {
            return FALSE;
        }
    }

    public function buscarTodos() {
        $categoria = new Categoria();
        if ($categoria->get()) {
            return $dados = $categoria->all_to_array();
        } else {
            return FALSE;
        }
    }

    public function inserir($dados) {
        $categoria = new Categoria();
        foreach ($dados as $coluna => $valor) {
            $categoria->$coluna = $valor;
        }
        if ($categoria->save()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function atualizar($obj, $where) {
        $categoria = new Categoria();
        foreach ($obj as $coluna => $valor) {
            $categoria->$coluna = $valor;
        }
        $categoria->where($where[0], $where[1]);
        $categoria->update();
    }

    public function excluir($id) {
        $categoria = new Categoria();
        $categoria->deleteById($id);
    }

    public function pesquisar($valor) {
        $obj = array('id', 'nome');
        $dados = '';
        for ($indice = 0; $indice < 6; $indice++) {
            $categoria = new Categoria();
            $categoria->where($obj[$indice], $valor['valor']);
            if ($categoria->get()) {
                $dados = $categoria->all_to_array();
                return $dados;
            }
        }
        return FALSE;
    }

}
