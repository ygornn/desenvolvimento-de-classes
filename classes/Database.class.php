<?php
class DataBase{
    public function criaConexao(){
        require_once('config.inc.php');
        try {
            $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
        } catch (PDOException $e) {
            echo "ERROR: " .$e->errorInfo;
            die();
        } finally{
            return $conexao;
        }
    }

    public function vinculaParametro($stmt, $param){
        try{
            foreach($param as $key=>$value){
                $stmt->bindValue($key, $value);
            }
            return $stmt;
        } catch(PDOException $e){
            echo "ERRO: " . $e->errorInfo;
        }
    }

    public function prepara($con, $sql, $par){
        $stmt = $con->prepare($sql);
        $stmt = $this->vinculaParametro($stmt, $par);
        return $stmt;
    }

    public function executar($sql, $param){
        $conexao = $this->criaConexao();
        $stmt = $this->prepara($conexao, $sql, $param);
        return $stmt->execute();
    }

    public function inserir($nome, $rg, $login, $senha){
        $sql = "INSERT INTO USUARIO (nome, rg, login, senha) 
                VALUES (:nome, :rg, :login, :senha)";
        $param = array(':nome' => $nome, ':senha' => $senha);
        $this->executar($sql, $param);
    }

    public function excluir($id){
        $sql = "DELETE FROM USUARIO WHERE id = :id";
        $param = array(':id' => $id);
        $this->executar($sql, $param);
    }

    public function atualizar($id, $rg, $login, $senha){
        $sql = "UPDATE FROM USUARIO SET nome = :nome, rg = :rg, login = :login, senha = :senha 
                WHERE id = :id";
        $param = array(':id' => $id, ':rg' => $rg, ':login' => $login, 'senha' => $senha);
        $this->executar($sql, $param);
    }
      
    public function listar($tipo = 0, $info = 0){
        $sql = "SELECT * FROM usuario";
        switch($tipo){
            case 1: $sql .= "WHERE id = :id";break;
            case 2: $sql .= "WHERE nome LIKE :id";break;
        }
        $param = array(':id' => $info . '%');
        $exec = $this->executar($sql, $param);
        //return $exec->fetchAll()
    }

}