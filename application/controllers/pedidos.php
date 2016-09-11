<?php

class Pedidos extends Controller {

    private $model;
    private $modelProdutos;
    private $modelFuncionario;
    private $modelCliente;

    function __construct() {
        parent::__construct();
        $this->load->native_helper('URLHelper');
        $this->model = new Pedido();
        $this->modelProdutos = new Produto();
        $this->modelFuncionario = new Funcionario();
        $this->modelCliente = new Cliente();
    }

    public function index() {
        $this->data['titulo'] = 'Projeto MVC - Pedidos';
        $dados['pedidos'] = $this->model->buscarTodos();
        $dados['funcionarios'] = $this->modelFuncionario->buscarTodos();
        $dados['clientes'] = $this->modelCliente->buscarTodos();
        foreach ($dados['pedidos'] as $pedido) {
            $modelItem = new Item();
            $modelItem->where('pedido_id', $pedido['id']);
            $modelItem->get();
            $itens = $modelItem->all_to_array();
            $total = 0;
            foreach ($itens as $item) {
                $total = $total + $item['valor_total'];
            }
            $dados['valores'][] = array('pedido_id' => $pedido['id'], 'total' => $total);
        }
        if (!empty($dados)) {
            $this->view('base/head');
            $this->view('pedidos/index', $dados);
            $this->view('base/foot');
        } else {
            $this->view('base/head');
            $this->view('pedidos/index');
            $this->view('base/foot');
        }
    }

    public function add($param1 = '') {
        $this->data['titulo'] = 'Projeto MVC - Novo Pedido';
        $dados['produtos'] = $this->modelProdutos->buscarTodos();
        $dados['funcionarios'] = $this->modelFuncionario->buscarTodos();
        $dados['clientes'] = $this->modelCliente->buscarTodos();
        if ($param1 != 'new') {
            $this->view('base/head');
            $this->view('pedidos/add', $dados);
            $this->view('base/foot');
        } else {
            $pedido = $this->post_to_array(array('funcionario_id', 'cliente_id', 'data_cadastro'));
            $this->model->inserir($pedido);
            $produto = $this->post_to_array(array('produtos'));
            for ($i = 0; $i < sizeof($produto['produtos']); $i++) {
                if ($produto['produtos'][$i]['quantidade'] == '' || !array_key_exists('produto_id', $produto['produtos'][$i])) {
                    unset($produto['produtos'][$i]);
                }
            }
            $numero = $this->model->maxId();
            print_r($numero);
            $modelItem = new Item();
            $modelItem->inserir($numero['max(id)'], $produto);
            redirect('pedidos');
        }
    }

    public function excluir($param1 = '', $param2 = '') {
        if ($param1 == 'id') {
            $item = new Item();
            $item->excluir($param2);
            unset($item);
            $this->model->excluir($param2);
            redirect('pedidos');
        }
    }

}
