<?php

class Cargos extends Controller {

    private $model;

    public function __construct() {
        parent::__construct();
        $this->load->native_helper('URLHelper');
        $this->model = new Cargo();
    }

    public function index() {
        $this->data['titulo'] = 'Projeto MVC - Cargos';
        $dados['cargos'] = $this->model->buscarTodos();
        if (!empty($dados)) {
            $this->view('base/head');
            $this->view('cargos/index', $dados);
            $this->view('base/foot');
        } else {
            $this->view('base/head');
            $this->view('cargos/index');
            $this->view('base/foot');
        }
    }

    public function add($param1 = '') {
        $this->data['titulo'] = 'Projeto MVC - Novo Cargo';
        if ($param1 != 'new') {
            $this->render('cargos/add');
        } else {
            $obj = $this->post_to_array(array('descricao', 'salario'));
            $this->model->inserir($obj);
            redirect('cargos');
        }
    }

    public function ler($param1 = '', $param2 = '') {
        $this->data['titulo'] = 'Projeto MVC - Visualizar Cargo';
        $dados['cargo'] = $this->model->buscarPorCod($param1, $param2);
        if (!empty($dados)) {
            $this->view('base/head');
            $this->view('cargos/view', $dados);
            $this->view('base/foot');
        }
    }

    public function editar($param1 = '', $param2 = '', $param3 = '') {
        $this->data['titulo'] = 'Projeto MVC - Editar Cargo';
        if ($param1 != 'read') {
            $obj = $this->post_to_array(array('descricao', 'salario'));
            $onde = array("0" => $param2, "1" => $param3);
            $this->model->atualizar($obj, $onde);
            redirect('cargos');
        } else {
            $dados['cargo'] = $this->model->buscarPorCod($param2, $param3);
            if (!empty($dados)) {
                $this->view('base/head');
                $this->view('cargos/edit', $dados);
                $this->view('base/foot');
            }
        }
    }

    public function excluir($param1 = '', $param2 = '') {
        if ($param1 == 'id') {
            $this->model->excluir($param2);
            redirect('cargos');
        }
    }

    public function pesquisar() {
        $this->data['titulo'] = 'Projeto MVC - Cargos';
        $obj = $this->post_to_array(array('valor'));
        $dados['cargos'] = $this->model->pesquisar($obj);
        $this->view('base/head');
        $this->view('cargos/index', $dados);
        $this->view('base/foot');
    }

}
