<?php
require_once('Usuario.class.php');
class Aluno extends Usuario{
    //private $aluno;
    private $matricula;
    private $turma;
  
    // public function setAluno($aluno){
    //     $this->aluno = $aluno;
    // }
    
    // public function getAluno(){
    //     return $this->aluno;
    // }

    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }
    
    public function getMatricula(){
        return $this->matricula;
    }
    
    public function setTurma($turma){
        $this->turma = $turma;
    }

    public function getTurma(){
        return $this->turma;
    }


    // public function efetuaLogin($email, $senha) : bool{
    //     require_once('config.inc.php');
    //     $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    //     $select = $conexao->query("SELECT (nome, senha) FROM aluno WHERE nome='$email' AND senha='$senha'");
    //     if($select != null){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    // public function inserir() : bool{
    //     //Conexão
    //     require_once('config.inc.php');
    //     $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    //     //Query
    //     $sql = "INSERT INTO aluno (nome, matricula, dtNascimento, email, senha) VALUES (:nome,:dtNascimento, :matricula, :email, :senha);";
    //     //Vincular parâmetros
    //     $stmt = $conexao->prepare($sql);
    //    // $stmt->bindValue(':nome', $this->getNome());
    //     $stmt->bindValue(':sobrenome', $this->getMatricula());
    //     $stmt->bindValue(':dtNascimento', $this->getDt());
    //     return $stmt->execute();
    // }

    // public function excluir () : bool{
    //     require_once('config.inc.php');
    //     $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    //     $sql = "DELETE FROM aluno WHERE idaluno = :id";
    //     $stmt = $conexao->prepare($sql);
    //     $stmt->bindValue(":id", $this->getId());
    //     return $stmt->execute();
    // }

    // public function editar () : bool{
    //     require_once('config.inc.php');
    //     $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    //     $sql = "UPDATE FROM aluno SET nome=:nome, matricula=:matricula, dtNascimento:dtNascimento,
    //             email=:email, senha=:senha WHERE idaluno = :id";
    //     $stmt = $conexao->prepare($sql);
    //     $stmt->bindValue(':id', $this->getId());
    //     //$stmt->bindValue(':nome', $this->getNome());
    //     $stmt->bindValue(':sobrenome', $this->getMatricula());
    //     $stmt->bindValue(':dtNascimento', $this->getDt());
    //     return $stmt->execute();
    // }

    //     /*** $tipo: tipo de consulta; $info: busca */
    //     public function listar ($tipo = 0, $info){
    //         require_once('config.inc.php');
    //         $conexao = new PDO(MYSQL_DSN, MYSQL_USUARIO, MYSQL_SENHA);
    //         $sql = 'SELECT * FROM aluno';
    //         switch($tipo){
    //             case 1: 
    //                 $sql .= 'WHERE idaluno=:info LIKE %:info';
    //                 break;
    //             case 2:
    //                 $sql .= 'WHERE nome=:info LIKE %:info';
    //                 break;
    //             case 3:
    //                 $sql .= 'WHERE matricula=:info LIKE %:info';
    //                 break;
    //         }
    
    //         $comando = $conexao->prepare($sql);
    //         if($tipo > 0)
    //         $comando->bindParam(':info', $info);
    
    //         if($comando->execute())
    //         return $comando->fetchAll();
    //     }
    
    public function __construct($pid, $pmatricula, $pturma, $pnome, $prg, $plogin, $psenha){
        //$this->setId($pid);
        $this->setMatricula($pmatricula);
        $this->setTurma($pturma);
        parent::__construct($pid, $pnome, $prg, $plogin, $psenha);
    }
    
    public function inserir($nome, $rg, $login, $senha){
        $sql = "INSERT INTO usuario (nome, rg, login, senha, matricula, turma) 
                VALUES (:nome, :rg, :login, :senha, :matricula, :turma)";
        $param = array(':nome' => $this->getNome(), ':rg' => $this->getRg(), ':login' => $this->getLogin(), ':senha' => $this->getSenha(), ':matricula' => $this->getMatricula(), ':turma' => $this->getTurma());
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
                    turma = :turma, 
                    matricula = :matricula
                WHERE id = :id";
        $param = array(':nome' => $this->getNome(),':rg' => $this->getRg(), ':login' => $this->getLogin(), 'senha' => $this->getSenha(),
                        ':matricula' => $this->getMatricula(), ':turma' => $this->getTurma(), ':id' => $this->getId());
        $this->executar($sql, $param);
    }

    public function listar($tipo = 0, $id = 0){
        $sql = 'SELECT * FROM usuario';
        switch($tipo){
            case 1: $sql .= ' WHERE id = :id';
            $param = array(':id' => $this->getId());break;
            case 2: $sql .= ' WHERE nome LIKE :id';
            $param = array(':id' =>  '%' . $this->getNome() . '%');break;
            default: $param = array();
        }

        $con = $this->criaConexao();
        $prepare = $this->prepara($con, $sql, $param);
        $prepare->execute();
        return $prepare->fetchAll();
    }
}
