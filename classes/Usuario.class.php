<?php
require_once('Database.class.php');
class Usuario extends DataBase{
    private $id;
    private $login;
    private $nome;
    private $rg;
    private $email;
    private $senha;
    

    /**
     * Get the value of id
     */
     

    /**
     * Set the value of id
     */
    public function setLogin($login)
    {
        $this->login = $login;

    }

    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of id
     */
     public function setId($id)
     {
        $this->id = $id;
     }
    
     public function getId()
    {
        return $this->id;
    }


    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * Get the value of rg
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * Set the value of rg
     */
    public function setRg($rg)
    {
        $this->rg = $rg;

    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email)
    {
        $this->email = $email;

    }

    /**
     * Get the value of senha
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    
    
    public function __construct($pid, $pnome, $prg, $plogin, $psenha)
    {
        $this->setId($pid);
        $this->setNome($pnome);
        $this->setLogin($plogin);
        $this->setRg($prg);
        $this->setEmail($plogin);
        $this->setSenha($psenha);
    }
}