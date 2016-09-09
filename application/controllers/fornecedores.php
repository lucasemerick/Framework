<?php

class Fornecedores extends Controller {

    private $model;
    private $modelendereco;

    public function __construct() {
        parent::__construct();
        $this->load->native_helper('URLHelper');
        $this->model = new Fornecedor();
        $this->modelendereco = new Endereco();
    }

    public function index() {
        $this->data['titulo'] = 'Projeto MVC - Fornecedores';
        $dados['fornecedores'] = $this->model->buscarTodos();
        if (!empty($dados)) {
            $this->view('base/head');
            $this->view('fornecedores/index', $dados);
            $this->view('base/foot');
        } else {
            $this->view('base/head');
            $this->view('fornecedores/index');
            $this->view('base/foot');
        }
    }

    public function add($param1 = '') {
        $this->data['titulo'] = 'Projeto MVC - Novo Fornecedor';
        $dados['enderecos'] = $this->modelendereco->buscarTodos();
        if ($param1 != 'new') {
            $this->view('base/head');
            $this->view('fornecedores/add', $dados);
            $this->view('base/foot');
        } else {
            $obj = $this->post_to_array(array('nome', 'cnpj', 'telefone', 'endereco_id'));
            $this->model->inserir($obj);
            redirect('fornecedores');
        }
    }

    public function ler($param1 = '', $param2 = '') {
        $this->data['titulo'] = 'Projeto MVC - Visualizar Fornecedores';
        $dados['fornecedor'] = $this->model->buscarPorCod($param1, $param2);
        $dados['enderecos'] = $this->modelendereco->buscarTodos();
        if (!empty($dados)) {
            $this->view('base/head');
            $this->view('fornecedores/view', $dados);
            $this->view('base/foot');
        }
    }

    public function editar($param1 = '', $param2 = '', $param3 = '') {
        $this->data['titulo'] = 'Projeto MVC - Editar Fornecedores';
        if ($param1 != 'read') {
            $obj = $this->post_to_array(array('nome', 'cnpj', 'telefone', 'endereco_id'));
            $onde = array("0" => $param2, "1" => $param3);
            $this->model->atualizar($obj, $onde);
            redirect('fornecedores');
        } else {
            $dados['fornecedor'] = $this->model->buscarPorCod($param2, $param3);
            $dados['enderecos'] = $this->modelendereco->buscarTodos();
            if (!empty($dados)) {
                $this->view('base/head');
                $this->view('fornecedores/edit', $dados);
                $this->view('base/foot');
            }
        }
    }

    public function excluir($param1 = '', $param2 = '') {
        if ($param1 == 'id') {
            $this->model->excluir($param2);
            redirect('fornecedores');
        }
    }

    public function pesquisar() {
        $this->data['titulo'] = 'Projeto MVC - Fornecedores';
        $obj = $this->post_to_array(array('valor'));
        $dados['fornecedores'] = $this->model->pesquisar($obj);
        $this->view('base/head');
        $this->view('fornecedores/index', $dados);
        $this->view('base/foot');
    }

}
