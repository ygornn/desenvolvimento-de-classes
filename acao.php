<?php
require_once('classes/aluno.class.php');
//require_once('usuario.class.php');
$login = isset($_POST['login']) ? $_POST['login'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$rg = isset($_POST['rg']) ? $_POST['rg'] : '';
$matricula = isset($_POST['matricula']) ? $_POST['matricula'] : '';
$turma = isset($_POST['turma']) ? $_POST['turma'] : '';
$matricula = isset($_POST['matricula']) ? $_POST['matricula'] : '';

//$user = new Usuario($nome, $login, $rg, $senha);
switch($_SERVER['REQUEST_METHOD']){
    case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : ''; 
        $id = isset($_POST['id']) ? $_POST['id'] : 0; 
    break;
    case 'GET': $acao = isset($_GET['acao']) ? $_GET['acao'] : ''; 
        $id = isset($_GET['id']) ? $_GET['id'] : '';
    break;
}

if($acao == 'Salvar' and $id == 0){
    $aluno = new Aluno($id, $matricula, $turma, $nome, $rg, $login, $senha);
    $aluno->inserir($nome, $rg, $login, $senha);
    header('location:apresenta.php');
}if($acao == 'apagar'){
    $aluno = new Aluno($id, '', '', '', '', '', '');
    $aluno->excluir($id);
    header('location:apresenta.php');
}else{
    $aluno = new Aluno($id, $matricula, $turma, $nome, $rg, $login, $senha);
    $aluno->atualizar($id, $rg, $login, $senha);
    header('location:apresenta.php');
}
//header('location:index.php');