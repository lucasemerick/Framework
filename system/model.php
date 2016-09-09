<?php

class Model {
#Variáveis para configuração da conexão ao Banco de Dados.

    private $db_host = 'localhost'; #Normalmente 'localhost' ou '127.0.0.1'	
    private $db_name = 'framework'; #Seleciona o banco a ser utilizado.
    private $db_user = 'root'; #Usuário do banco.
    private $db_pass = ''; #Senha do usuário.
    private $conn; #Variável para a instância da conexão.
    public $id; #Identificador do Objeto
    public $data;    #Dados do Objeto
    protected $tabela; #Tabela relacionado ao Objeto;
    private $select = '*'; #valor padrão *
    private $where = '';
    private $order_by = '';
    private $limit = '';
    private $offset = '';
    private $query; #armazena a query executada.
    private $result; #resultado de dados encontrado pela query.
    protected $one_to_one; # um para um
    protected $one_to_many; # um para muitos
    protected $many_to_many; # muitos para muitos

    #Através do construtor inicializaremos a conexão

    protected function __construct() {
        /*
          uma instancia típica do PDO tem os seguintes parâmetros.
          new PDO($dsn, $user, $pass, $driver_options);
         */
        #Configuração da dsn
        $dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;
        #Uma opção útil para valores utf8.
        $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        #Instância da conexão armazenada na variavel $conn.
        $this->conn = new PDO($dsn, $this->db_user, $this->db_pass, $opcoes);
        $this->setAttributes();
    }

    /*
      Função que irá definir os atributos da Classe/Objeto
      Baseada nas colunas da tabela.
     */

    private function setAttributes() {
        $q = $this->conn->query('USE framework');
        $q = '';
        #query que vai pegar as colunas de uma tabela.
        $q = $this->conn->prepare("DESCRIBE `{$this->tabela}`");
        $q->execute();
        #Armazena o resultado
        $attributes = $q->fetchAll(PDO::FETCH_COLUMN);
        #Vamos passar por todos os índices do Array para setar valores...
        #de atributos no objeto e também na variável data.
        foreach ($attributes as $field) {
            #O ID não deve ser inserido, pois se trata de objeto novo.
            if ($field == 'id') {
                continue;
            }
            $this->data[$field] = null; #$data será um array.
            #um mesmo endereçamento de memória para os atributos.
            $this->$field = &$this->data[$field];
            #assim um valor alterado, será o mesmo em ambos.
        }
    }

    #WARNING: this method can cause low performance
    #ALERTA: este método pode causar baixa performace

    public function recursiveGet() {
        if ($this->one_to_one) {
            foreach ($this->one_to_one as $name) {
                $var = $name . '_id'; # Padrão
                $r_id = $this->$var; # Pega o ID
                if (empty($r_id)) {
                    continue; #Tratamento, caso estiver em branco "pula".
                }
                $obj = new $name(); # Instancia o Objeto Vazio
                $obj->getById($r_id); # Carrega o Objeto a partir do banco.
                $obj->recursiveGet(); # Verifica e carrega os relacionamento do novo objeto.
                $this->$name = $obj; # Seta o Objeto como variável
                #	OU
                #$this->$name = $obj->to_array(); //para trazer apenas o array;
            }
        }

        if ($this->one_to_many) {
            foreach ($this->one_to_many as $name) {
                $obj = new $name(); # Instancia O Objeto
                $tmp = strtolower(get_class($this)); # Pega o nome do model.
                $obj->where($tmp . '_id', $this->id); # Filtra pelo relacionamento.
                $obj->get(); # Faz a busca
                $var = $name . '_list'; # Nome Temporariamente Padrão, para tratar de listas.
                $this->$var = $obj->all_to_array(); # Seta com variável.
            }
        }
    }

    #READ

    public function get() {
        if ($this->select != '*' && !preg_match('/^id,/', $this->select)) {
            $this->select = 'id,' . $this->select;
        }
        $sql = "SELECT {$this->select} FROM {$this->tabela} {$this->where} {$this->order_by} {$this->limit} {$this->offset}";
        $this->query = $this->conn->query($sql);
        $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);
        #O primeiro resultado será o próprio objeto instanciado.
        if (empty($this->result)) {
            return FALSE;
        }
        $temp = $this->result[0];
        if (!is_null($temp)) {
            $this->id = $temp['id'];
            unset($temp['id']);
            foreach ($temp as $k => $v) {
                $this->data[$k] = $v;
            }
            return TRUE;
        }
        unset($this->where);
    }

    #CREATE

    public function save() {
        if (is_int($this->id)) {
            return $this->update();
        }
        $keys = '';
        $values = '';
        foreach ($this->data as $k => $v) {
            if (empty($v)) {
                continue;
            }
            $keys .= ',' . $k;
            $values .= ",'{$v}'";
        }

        $keys = substr($keys, 1);
        $values = substr($values, 1);

        $sql = "INSERT INTO {$this->tabela}({$keys}) VALUES({$values})";
        $this->conn->query($sql);
        #echo $sql;
    }

    #UPDATE

    public function update() {
        if (empty($this->where)) {
            $this->where('id', $this->id);
        }
        $set = '';
        foreach ($this->data as $k => $v) {
            $set .=", {$k}='{$v}'";
        }
        $set = substr($set, 1);


        $sql = "UPDATE {$this->tabela} SET {$set} {$this->where}";
        $this->conn->query($sql);
        #echo $sql;
    }

    #DELETE

    public function delete() {
        $sql = "DELETE FROM {$this->tabela} WHERE id='{$this->id}'";
        $this->conn->query($sql);
    }

    #DELETE

    public function deleteById($id) {
        $sql = "DELETE FROM {$this->tabela} WHERE id='{$id}'";
        $this->conn->query($sql);
    }

    #READ

    public function getById($id) {
        $this->where('id', $id);
        $this->get();
    }

    public function like($column, $value, $position = null) {
        switch ($position) {
            case 'START':
                $this->where .= empty($this->where) ? "WHERE {$column} LIKE'{$value}%'" : " AND LIKE {$column}='{$value}%' ";
                break;
            case 'END':
                $this->where .= empty($this->where) ? "WHERE {$column} LIKE'%{$value}'" : " AND LIKE {$column}='%{$value}' ";
                break;
            default:
                $this->where .= empty($this->where) ? "WHERE {$column} LIKE'%{$value}%'" : " AND LIKE {$column}='%{$value}%' ";
                break;
        }
    }

    public function or_like($column, $value, $position = null) {
        switch ($position) {
            case 'START':
                $this->where .= empty($this->where) ? "WHERE {$column} LIKE'{$value}%'" : " OR LIKE {$column}='{$value}%' ";
                break;
            case 'END':
                $this->where .= empty($this->where) ? "WHERE {$column} LIKE'%{$value}'" : " OR LIKE {$column}='%{$value}' ";
                break;
            default:
                $this->where .= empty($this->where) ? "WHERE {$column} LIKE'%{$value}%'" : " OR LIKE {$column}='%{$value}%' ";
                break;
        }
    }

    public function to_array() {
        return $this->result[0];
    }

    public function all_to_array() {
        return $this->result;
    }

    public function select(Array $params) {
        $this->select = implode(',', $params);
    }

    public function where($column, $value) {
        $this->where .= empty($this->where) ? "WHERE {$column}='{$value}'" : " and {$column}='{$value}' ";
    }

    public function order_by(Array $params, $ordem = 'ASC') {
        $this->order_by = 'ORDER BY ';
        foreach ($params as $param) {
            $this->order_by .= "{$param} {$ordem},";
        }

        $this->order_by = substr($this->order_by, 0, -1);
    }

    public function limit($value) {
        $this->limit = "LIMIT " . $value;
    }

    public function offset($value) {
        $this->offset = "OFFSET " . $value;
    }

}
