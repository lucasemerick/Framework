<?php

class Funcionario extends Model {

    protected $tabela = 'funcionarios';
    protected $one_to_one = array('cargo', 'endereco');

    public function __construct() {
        parent::__construct();
    }

    public function __destruct() {
        
    }

    public function buscarPorCodRecursive($valor = '') {
        $funcionario = new Funcionario();
        $funcionario->getById($valor);
        $dados = $funcionario->recursiveGet();
        return $dados;
    }

    public function buscarPorCod($coluna = '', $valor = '') {
        $funcionario = new Funcionario();
        $funcionario->where($coluna, $valor);
        if ($funcionario->get()) {
            return $dados = $funcionario->to_array();
        } else {
            return FALSE;
        }
    }

    public function buscarTodos() {
        $funcionario = new Funcionario();
        if ($funcionario->get()) {
            return $dados = $funcionario->all_to_array();
        } else {
            return FALSE;
        }
    }

    public function inserir($dados) {
        $funcionario = new Funcionario();
        foreach ($dados as $coluna => $valor) {
            $funcionario->$coluna = $valor;
        }
        if ($funcionario->save()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function atualizar($obj, $where) {
        $funcionario = new Funcionario();
        foreach ($obj as $coluna => $valor) {
            $funcionario->$coluna = $valor;
        }
        $funcionario->where($where[0], $where[1]);
        $funcionario->update();
    }

    public function excluir($id) {
        $funcionario = new Funcionario();
        $funcionario->deleteById($id);
    }

    public function pesquisar($valor) {
        $obj = array('id', 'nome', 'entrada', 'telefone');
        $dados = '';
        for ($indice = 0; $indice < 6; $indice++) {
            $funcionario = new Funcionario();
            $funcionario->where($obj[$indice], $valor['valor']);
            if ($funcionario->get()) {
                $dados = $funcionario->all_to_array();
                return $dados;
            }
        }
        return FALSE;
    }

}
