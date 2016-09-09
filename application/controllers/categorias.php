<?php

class Categorias extends Controller {

    private $model;

    public function __construct() {
        parent::__construct();
        $this->load->native_helper('URLHelper');
        $this->model = new Categoria();
    }

    public function index() {
        $this->data['titulo'] = 'Projeto MVC - Categorias';
        $dados['categorias'] = $this->model->buscarTodos();
        if (!empty($dados)) {
            $this->view('base/head');
            $this->view('categorias/index', $dados);
            $this->view('base/foot');
        } else {
            $this->view('base/head');
            $this->view('categorias/index');
            $this->view('base/foot');
        }
    }

    public function add($param1 = '') {
        $this->data['titulo'] = 'Projeto MVC - Novo Categoria';
        if ($param1 != 'new') {
            $this->render('categorias/add');
        } else {
            $obj = $this->post_to_array(array('nome'));
            $this->model->inserir($obj);
            redirect('categorias');
        }
    }

    public function ler($param1 = '', $param2 = '') {
        $this->data['titulo'] = 'Projeto MVC - Visualizar Categoria';
        $dados['categoria'] = $this->model->buscarPorCod($param1, $param2);
        if (!empty($dados)) {
            $this->view('base/head');
            $this->view('categorias/view', $dados);
            $this->view('base/foot');
        }
    }

    public function editar($param1 = '', $param2 = '', $param3 = '') {
        $this->data['titulo'] = 'Projeto MVC - Editar Categoria';
        if ($param1 != 'read') {
            $obj = $this->post_to_array(array('nome'));
            $onde = array("0" => $param2, "1" => $param3);
            $this->model->atualizar($obj, $onde);
            redirect('categorias');
        } else {
            $dados['categoria'] = $this->model->buscarPorCod($param2, $param3);
            if (!empty($dados)) {
                $this->view('base/head');
                $this->view('categorias/edit', $dados);
                $this->view('base/foot');
            }
        }
    }

    public function excluir($param1 = '', $param2 = '') {
        if ($param1 == 'id') {
            $this->model->excluir($param2);
            redirect('categorias');
        }
    }

    public function pesquisar() {
        $this->data['titulo'] = 'Projeto MVC - Categorias';
        $obj = $this->post_to_array(array('valor'));
        $dados['categorias'] = $this->model->pesquisar($obj);
        $this->view('base/head');
        $this->view('categorias/index', $dados);
        $this->view('base/foot');
    }

}
