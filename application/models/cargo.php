<?php

class Cargo extends Model {

    protected $tabela = 'cargos';

    public function __construct() {
        parent::__construct();
    }

    public function __destruct() {
        
    }

    public function buscarPorCod($coluna = '', $valor = '') {
        $cargo = new Cargo();
        $cargo->where($coluna, $valor);
        if ($cargo->get()) {
            return $dados = $cargo->to_array();
        } else {
            return FALSE;
        }
    }

    public function buscarTodos() {
        $cargo = new Cargo();
        if ($cargo->get()) {
            return $dados = $cargo->all_to_array();
        } else {
            return FALSE;
        }
    }

    public function inserir($dados) {
        $cargo = new Cargo();
        foreach ($dados as $coluna => $valor) {
            $cargo->$coluna = $valor;
        }
        if ($cargo->save()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function atualizar($obj, $where) {
        $cargo = new Cargo();
        foreach ($obj as $coluna => $valor) {
            $cargo->$coluna = $valor;
        }
        $cargo->where($where[0], $where[1]);
        $cargo->update();
    }

    public function excluir($id) {
        $cargo = new Cargo();
        $cargo->deleteById($id);
    }

    public function pesquisar($valor) {
        $obj = array('id', 'descricao', 'salario');
        $dados = '';
        for ($indice = 0; $indice < 6; $indice++) {
            $cargo = new Cargo();
            $cargo->where($obj[$indice], $valor['valor']);
            if ($cargo->get()) {
                $dados = $cargo->all_to_array();
                return $dados;
            }
        }
        return FALSE;
    }

}
