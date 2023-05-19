<?php
require_once('Servidor.class.php');
class Professor extends Servidor{
    private $carga;
    

    /**
     * Get the value of salario
     */
    public function getCarga()
    {
        return $this->carga;
    }

    /**
     * Set the value of salario
     */
    public function setCarga($salario)
    {
        $this->carga = $salario;

    }

    public function __construct($siape, $dataAdms, $carga, $pid, $pnome, $prg, $plogin, $psenha){
        $this->setCarga($carga);
        parent::__construct($siape, $dataAdms, $pid, $pnome, $prg, $plogin, $psenha);
    }

    public function inserir($nome, $rg, $login, $senha){
        $sql = "INSERT INTO usuario (nome, rg, login, senha, dataadm, siape, salario, carga) 
                VALUES (:nome, :rg, :login, :senha, :data, :siape, :salario, :carga)";
        $param = array(':nome' => $this->getNome(), ':rg' => $this->getRg(), ':login' => $this->getLogin(), ':senha' => $this->getSenha(), 
        ':data' => $this->getDataAdms(), ':turma' => $this->getSiape(), ':salario' => $this->getSalario(), ':carga' => $this->getCarga());
        $this->executar($sql, $param);
    }

    public function excluir($id){
        $sql = "DELETE FROM usuario WHERE id = :id";
        $param = array(':id' => $this->getId());
        $this->executar($sql, $param);
    }

    public function atualizar($id, $rg, $login, $senha){
        $sql = "UPDATE usuario 
                SET nome = :nome, 
                    rg = :rg, 
                    login = :login, 
                    senha = :senha,
                    turma = :data, 
                    matricula = :siape
                WHERE id = :id";
        $param = array(':nome' => $this->getNome(),':rg' => $this->getRg(), ':login' => $this->getLogin(), 'senha' => $this->getSenha(),
                        ':siape' => $this->getDataAdms(), ':data' => $this->getSiape(), ':id' => $this->getId());
        $this->executar($sql, $param);
    }

    public function listar($tipo= 0, $info = ''){
        $sql = "SELECT * FROM usuario";
        // switch($tipo){
        //     case 1: $sql .= "WHERE id = :id";break;
        //     case 2: $sql .= "WHERE nome LIKE :nome";break;
        // }
        $param = array(':id' => $this->getId() . '%');
        $con = $this->criaConexao();
        $prepare = $this->prepara($con, $sql, $param);
        //$stmt = $prepare->fetchAll();
        $prepare->execute();
        return $prepare->fetchAll();
    }
}