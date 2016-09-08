<?php

class Enderecos extends Controller {

    private $model;

    function __construct() {
        parent::__construct();
        $this->load->native_helper('URLHelper');
        $this->model = new Endereco();
    }

    public function index() {
        $this->data['titulo'] = 'Projeto MVC - Endereços';
        $dados['enderecos'] = $this->model->buscarTodos();
        if (!empty($dados)) {
            $this->view('base/head');
            $this->view('enderecos/index', $dados);
            $this->view('base/foot');
        } else {
            $this->view('base/head');
            $this->view('enderecos/index');
            $this->view('base/foot');
        }
    }

    public function add($param1 = '') {
        $this->data['titulo'] = 'Projeto MVC - Novo Endereço';
        if ($param1 != 'new') {
            $this->render('enderecos/add');
        } else {
            $obj = $this->post_to_array(array('cep', 'logradouro', 'bairro', 'cidade', 'estado'));
            $this->model->inserir($obj);
            redirect('enderecos');
        }
    }

    public function ler($param1 = '', $param2 = '') {
        $this->data['titulo'] = 'Projeto MVC - Visualizar Endereço';
        $dados['endereco'] = $this->model->buscarPorCod($param1, $param2);
        if (!empty($dados)) {
            $this->view('base/head');
            $this->view('enderecos/view', $dados);
            $this->view('base/foot');
        }
    }

    public function editar($param1 = '', $param2 = '', $param3 = '') {
        $this->data['titulo'] = 'Projeto MVC - Editar Endereço';
        if ($param1 != 'read') {
            $obj = $this->post_to_array(array('cep', 'logradouro', 'bairro', 'cidade', 'estado'));
            $onde = array("0" => $param2, "1" => $param3);
            $this->model->atualizar($obj, $onde);
            redirect('enderecos');
        } else {
            $dados['endereco'] = $this->model->buscarPorCod($param2, $param3);
            if (!empty($dados)) {
                $this->view('base/head');
                $this->view('enderecos/edit', $dados);
                $this->view('base/foot');
            }
        }
    }

    public function excluir($param1 = '', $param2 = '') {
        if ($param1 == 'id') {
            $this->model->excluir($param2);
            redirect('enderecos');
        }
    }

    public function pesquisar() {
        $this->data['titulo'] = 'Projeto MVC - Endereços';
        $obj = $this->post_to_array(array('valor'));
        $dados['enderecos'] = $this->model->pesquisar($obj);
        $this->view('base/head');
        $this->view('enderecos/index', $dados);
        $this->view('base/foot');
    }

}
