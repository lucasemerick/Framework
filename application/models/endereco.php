<?php

class Endereco extends Model {

    protected $tabela = 'enderecos';

    public function __construct() {
        parent::__construct();
    }

    public function __destruct() {
        
    }

    public function buscarPorCod($coluna = '', $valor = '') {
        $endereco = new Endereco();
        $endereco->where($coluna, $valor);
        if ($endereco->get()) {
            return $dados = $endereco->to_array();
        } else {
            return FALSE;
        }
    }

    public function buscarTodos() {
        $endereco = new Endereco();
        if ($endereco->get()) {
            return $dados = $endereco->all_to_array();
        } else {
            return FALSE;
        }
    }

    public function inserir($dados) {
        $endereco = new Endereco();
        foreach ($dados as $coluna => $valor) {
            $endereco->$coluna = $valor;
        }
        if ($endereco->save()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function atualizar($obj, $where) {
        $endereco = new Endereco();
        foreach ($obj as $coluna => $valor) {
            $endereco->$coluna = $valor;
        }
        $endereco->where($where[0], $where[1]);
        $endereco->update();
    }

    public function excluir($id) {
        $endereco = new Endereco();
        $endereco->deleteById($id);
    }

    public function pesquisar($valor) {
        $obj = array('id', 'cep', 'logradouro', 'bairro', 'cidade', 'estado');
        $dados = '';
        for ($indice = 0; $indice < 6; $indice++) {
            $endereco = new Endereco();
            $endereco->where($obj[$indice], $valor['valor']);
            if ($endereco->get()) {
                $dados = $endereco->all_to_array();
                return $dados;
            }
        }
        return FALSE;
    }

}
