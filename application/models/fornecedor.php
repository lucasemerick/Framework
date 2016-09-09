<?php

class Fornecedor extends Model {

    protected $tabela = 'fornecedores';
    protected $one_to_one = array('endereco');

    #protected $one_to_many = array();
    #protected $many_to_many = array();

    public function __construct() {
        parent::__construct();
    }

    public function __destruct() {
        
    }

    public function buscarPorCod($coluna = '', $valor = '') {
        $fornecedor = new Fornecedor();
        $fornecedor->where($coluna, $valor);
        if ($fornecedor->get()) {
            return $dados = $fornecedor->to_array();
        } else {
            return FALSE;
        }
    }

    public function buscarTodos() {
        $fornecedor = new Fornecedor();
        if ($fornecedor->get()) {
            return $dados = $fornecedor->all_to_array();
        } else {
            return FALSE;
        }
    }

    public function inserir($dados) {
        $fornecedor = new Fornecedor();
        foreach ($dados as $coluna => $valor) {
            $fornecedor->$coluna = $valor;
        }
        if ($fornecedor->save()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function atualizar($obj, $where) {
        $fornecedor = new Fornecedor();
        foreach ($obj as $coluna => $valor) {
            $fornecedor->$coluna = $valor;
        }
        $fornecedor->where($where[0], $where[1]);
        $fornecedor->update();
    }

    public function excluir($id) {
        $fornecedor = new Fornecedor();
        $fornecedor->deleteById($id);
    }

    public function pesquisar($valor) {
        $obj = array('id', 'nome', 'cnpj', 'telefone', 'endereco_id');
        $dados = '';
        for ($indice = 0; $indice < 6; $indice++) {
            $fornecedor = new Fornecedor();
            $fornecedor->where($obj[$indice], $valor['valor']);
            if ($fornecedor->get()) {
                $dados = $fornecedor->all_to_array();
                return $dados;
            } else {
                return FALSE;
            }
        }
        return FALSE;
    }

}
