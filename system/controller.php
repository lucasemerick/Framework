<?php

class Controller {

    protected $load;
    public $data = array();

    function __construct() {
        $this->load = new Loader();
    }

    protected function view($file, Array $vars = null) {
        if (count($vars) > 0) {
            extract($vars);
        }
        require_once ('application/views/' . $file . '.php');
    }

    /* EXAMPLE:
      /	Pra em qualquer controller chamar:
      /	$this->render('alguma-view');
      /	OU
      /	$this->render('algum-subdiretorio/alguma-view');
     */

    protected function render($file) {
        $this->view('base/head', $this->data);
        $this->view($file, $this->data);
        $this->view('base/foot', $this->data);
    }

    /* EXAMPLE
      /	para capturar os valores POST de algum formulario:
      /	$arr = $this->post_to_array(array('descricao','quantidade','valor'))
     */

    protected function post_to_array(Array $names) {
        $arr = array();
        foreach ($names as $name) {
            $arr[$name] = $_POST[$name];
        }
        return  $arr;
    }

    /* EXAMPLE
      /	para capturar os valores POST e adicionar diretamente ao objeto.
      /	$obj = $this->post_to_obj(array('descricao','quantidade','valor'), new Produto());
     */

    protected function post_to_obj(Array $names, $obj) {
        foreach ($names as $name) {
            $obj->$name = $_POST[$name];
        }
        return $obj;
    }

}

?>