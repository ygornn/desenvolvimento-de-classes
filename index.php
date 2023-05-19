<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO</title>
    <?php 
        require_once('classes/Aluno.class.php');
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
        $aluno = new Aluno($id, '', '', '', '', '', '');
        if($acao == 'editar')
        $data = $aluno->listar(1,$id);
        //var_dump($data);
    ?>
</head>
<body>
    <form action="acao.php" method="post">
        <label for="usuario">ID:</label>
        <input type="text" name="id" id="id" readonly value="<?php if($acao == 'editar'){echo $data[0]['id'];}else{echo 0;}  ?>"><br>
        <label for="usuario">Usuário:</label>
        <input type="text" name="login" id="login" value="<?php if($acao == 'editar')echo $data[0]['login']; ?>"><br>
        <label for="usuario">Senha:</label>
        <input type="password" name="senha" id="senha" value="<?php if($acao == 'editar')echo $data[0]['senha']; ?>"><br>
        <label for="usuario">Nome do aluno:</label>
        <input type="text" name="nome" id="nome" value="<?php if($acao == 'editar')echo $data[0]['nome']; ?>"><br>
        <label for="usuario">RG:</label>
        <input type="text" name="rg" id="rg" value="<?php if($acao == 'editar')echo $data[0]['rg']; ?>"><br>
        <label for="usuario">Matrícula:</label>
        <input type="text" name="matricula" id="matricula" value="<?php if($acao == 'editar')echo $data[0]['matricula']; ?>"><br>
        <label for="usuario">Turma:</label>
        <input type="text" name="turma" id="turma" value="<?php if($acao == 'editar')echo $data[0]['turma']; ?>"><br>
        <input type="submit" value="Salvar" name="acao" id="acao">
    </form>
    <a href="apresenta.php">Consultar usuários</a>
</body>
</html>