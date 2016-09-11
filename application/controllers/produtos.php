<?php

class Produtos extends Controller {

    private $model;
    private $modelfornecedor;
    private $modelcategoria;

    public function __construct() {
        parent::__construct();
        $this->load->native_helper('URLHelper');
        $this->model = new Produto();
        $this->modelfornecedor = new Fornecedor();
        $this->modelcategoria = new Categoria();
    }

    public function index() {
        $this->data['titulo'] = 'Projeto MVC - Produtos';
        $dados['produtos'] = $this->model->buscarTodos();
        if (!empty($dados)) {
            $this->view('base/head');
            $this->view('produtos/index', $dados);
            $this->view('base/foot');
        } else {
            $this->view('base/head');
            $this->view('produtos/index');
            $this->view('base/foot');
        }
    }

    public function add($param1 = '') {
        $this->data['titulo'] = 'Projeto MVC - Novo Produto';
        $dados['fornecedores'] = $this->modelfornecedor->buscarTodos();
        $dados['categorias'] = $this->modelcategoria->buscarTodos();
        if ($param1 != 'new') {
            $this->view('base/head');
            $this->view('produtos/add', $dados);
            $this->view('base/foot');
        } else {
            $obj = $this->post_to_array(array('descricao', 'fornecedor_id', 'categoria_id', 'quantidade', 'valor'));
            $this->model->inserir($obj);
            redirect('produtos');
        }
    }

    public function ler($param1 = '', $param2 = '') {
        $this->data['titulo'] = 'Projeto MVC - Visualizar Produto';
        $dados['produto'] = $this->model->buscarPorCod($param1, $param2);
        $dados['fornecedores'] = $this->modelfornecedor->buscarTodos();
        $dados['categorias'] = $this->modelcategoria->buscarTodos();
        if (!empty($dados)) {
            $this->view('base/head');
            $this->view('produtos/view', $dados);
            $this->view('base/foot');
        }
    }

    public function editar($param1 = '', $param2 = '', $param3 = '') {
        $this->data['titulo'] = 'Projeto MVC - Editar Produto';
        if ($param1 != 'read') {
            $obj = $this->post_to_array(array('descricao', 'fornecedor_id', 'categoria_id', 'quantidade', 'valor'));
            $onde = array("0" => $param2, "1" => $param3);
            $this->model->atualizar($obj, $onde);
            redirect('produtos');
        } else {
            $dados['produto'] = $this->model->buscarPorCod($param2, $param3);
            $dados['fornecedores'] = $this->modelfornecedor->buscarTodos();
            $dados['categorias'] = $this->modelcategoria->buscarTodos();
            if (!empty($dados)) {
                $this->view('base/head');
                $this->view('produtos/edit', $dados);
                $this->view('base/foot');
            }
        }
    }

    public function excluir($param1 = '', $param2 = '') {
        if ($param1 == 'id') {
            $this->model->excluir($param2);
            redirect('produtos');
        }
    }

    public function pesquisar() {
        $this->data['titulo'] = 'Projeto MVC - Produtos';
        $obj = $this->post_to_array(array('valor'));
        $dados['produtos'] = $this->model->pesquisar($obj);
        $this->view('base/head');
        $this->view('produtos/index', $dados);
        $this->view('base/foot');
    }

}
