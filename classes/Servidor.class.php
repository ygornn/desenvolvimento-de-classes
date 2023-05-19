<?php
require_once('Usuario.class.php');
class Servidor extends Usuario{
    protected $salario;
    protected $siape;
    protected $dataAdms;

    /**
     * Get the value of siape
     */
    public function getSiape()
    {
        return $this->siape;
    }

    /**
     * Set the value of siape
     */
    public function setSiape($siape): self
    {
        $this->siape = $siape;

        return $this;
    }

    /**
     * Get the value of dataAdms
     */
    public function getDataAdms()
    {
        return $this->dataAdms;
    }

    /**
     * Set the value of dataAdms
     */
    public function setDataAdms($dataAdms): self
    {
        $this->dataAdms = $dataAdms;
        
        return $this;
    }
    /**
     * Get the value of salario
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * Set the value of salario
     */
    public function setSalario($salario): self
    {
        $this->salario = $salario;

        return $this;
    }

    public function __construct($siape, $dataAdms, $pid, $pnome, $prg, $plogin, $psenha)
    {
        $this->setSiape($siape);
        $this->setDataAdms($dataAdms);
        parent::__construct($pid, $pnome, $prg, $plogin, $psenha);
    }

    public function inserir($nome, $rg, $login, $senha){
        $sql = "INSERT INTO usuario (nome, rg, login, senha, dataadm, siape, salario) 
                VALUES (:nome, :rg, :login, :senha, :data, :siape, :salario)";
        $param = array(':nome' => $this->getNome(), ':rg' => $this->getRg(), ':login' => $this->getLogin(), ':senha' => $this->getSenha(), 
        ':data' => $this->getDataAdms(), ':turma' => $this->getSiape(), ':salario'=> $this->getSalario());
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