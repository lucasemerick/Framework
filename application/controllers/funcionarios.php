<?php

class Funcionarios extends Controller {

    private $model;
    private $modelendereco;
    private $modelcargo;

    public function __construct() {
        parent::__construct();
        $this->load->native_helper('URLHelper');
        $this->model = new Funcionario();
        $this->modelendereco = new Endereco();
        $this->modelcargo = new Cargo();
    }

    public function index() {
        $this->data['titulo'] = 'Projeto MVC - Funcionários';
        $dados['funcionarios'] = $this->model->buscarTodos();
        if (!empty($dados)) {
            $this->view('base/head');
            $this->view('funcionarios/index', $dados);
            $this->view('base/foot');
        } else {
            $this->view('base/head');
            $this->view('funcionarios/index');
            $this->view('base/foot');
        }
    }

    public function add($param1 = '') {
        $this->data['titulo'] = 'Projeto MVC - Novo Funcionário';
        $dados['enderecos'] = $this->modelendereco->buscarTodos();
        $dados['cargos'] = $this->modelcargo->buscarTodos();
        if ($param1 != 'new') {
            $this->view('base/head');
            $this->view('funcionarios/add', $dados);
            $this->view('base/foot');
        } else {
            $obj = $this->post_to_array(array('nome', 'entrada', 'telefone', 'cargo_id', 'endereco_id'));
            $this->model->inserir($obj);
            redirect('funcionarios');
        }
    }

    public function ler($param1 = '', $param2 = '') {
        $this->data['titulo'] = 'Projeto MVC - Visualizar Funcionário';
        $dados['funcionario'] = $this->model->buscarPorCod($param1, $param2);
        $dados['enderecos'] = $this->modelendereco->buscarTodos();
        $dados['cargos'] = $this->modelcargo->buscarTodos();
        if (!empty($dados)) {
            $this->view('base/head');
            $this->view('funcionarios/view', $dados);
            $this->view('base/foot');
        }
    }

    public function editar($param1 = '', $param2 = '', $param3 = '') {
        $this->data['titulo'] = 'Projeto MVC - Editar Funcionário';
        if ($param1 != 'read') {
            $obj = $this->post_to_array(array('nome', 'entrada', 'telefone', 'cargo_id', 'endereco_id'));
            $onde = array("0" => $param2, "1" => $param3);
            $this->model->atualizar($obj, $onde);
            redirect('funcionarios');
        } else {
            $dados['funcionario'] = $this->model->buscarPorCod($param2, $param3);
            $dados['enderecos'] = $this->modelendereco->buscarTodos();
            $dados['cargos'] = $this->modelcargo->buscarTodos();
            if (!empty($dados)) {
                $this->view('base/head');
                $this->view('funcionarios/edit', $dados);
                $this->view('base/foot');
            }
        }
    }

    public function excluir($param1 = '', $param2 = '') {
        if ($param1 == 'id') {
            $this->model->excluir($param2);
            redirect('funcionarios');
        }
    }

    public function pesquisar() {
        $this->data['titulo'] = 'Projeto MVC - Funcionários';
        $obj = $this->post_to_array(array('valor'));
        $dados['funcionarios'] = $this->model->pesquisar($obj);
        $this->view('base/head');
        $this->view('funcionarios/index', $dados);
        $this->view('base/foot');
    }

}
