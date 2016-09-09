<?php

class Cliente extends Model {

    protected $tabela = 'clientes';
    protected $one_to_one = array('endereco');

    #protected $one_to_many = array();
    #protected $many_to_many = array();

    public function __construct() {
        parent::__construct();
    }

    public function __destruct() {
        
    }

    public function buscarPorCodRecursive($valor = '') {
        $cliente = new Cliente();
        $cliente->getById($valor);
        $dados = $cliente->recursiveGet();
        return $dados;
    }

    public function buscarPorCod($coluna = '', $valor = '') {
        $cliente = new Cliente();
        $cliente->where($coluna, $valor);
        if ($cliente->get()) {
            return $dados = $cliente->to_array();
        } else {
            return FALSE;
        }
    }

    public function buscarTodos() {
        $cliente = new Cliente();
        if ($cliente->get()) {
            return $dados = $cliente->all_to_array();
        } else {
            return FALSE;
        }
    }

    public function inserir($dados) {
        $cliente = new Cliente();
        foreach ($dados as $coluna => $valor) {
            $cliente->$coluna = $valor;
        }
        if ($cliente->save()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function atualizar($obj, $where) {
        $cliente = new Cliente();
        foreach ($obj as $coluna => $valor) {
            $cliente->$coluna = $valor;
        }
        $cliente->where($where[0], $where[1]);
        $cliente->update();
    }

    public function excluir($id) {
        $cliente = new Cliente();
        $cliente->deleteById($id);
    }

    public function pesquisar($valor) {
        $obj = array('id', 'nome', 'cpf', 'telefone', 'renda', 'data_cadastro', 'endereco_id');
        $dados = '';
        for ($indice = 0; $indice < 6; $indice++) {
            $cliente = new Cliente();
            $cliente->where($obj[$indice], $valor['valor']);
            if ($cliente->get()) {
                $dados = $cliente->all_to_array();
                return $dados;
            }
        }
        return FALSE;
    }

}
