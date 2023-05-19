<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO</title>
    <?php 
        require_once('classes/Aluno.class.php'); 
        $busca = isset($_POST['pesquisa']) ? $_POST['pesquisa'] : '';
        if($busca){
        $aluno = new Aluno('', '', '', $busca, '', '', '', '');
        $data = $aluno->listar(2, $busca);
        }
        else{
            $aluno = new Aluno('', '', '', '', '', '', '', '');
            $data = $aluno->listar();
        }
    ?>
</head>
<body>
    <a href="index.php">Voltar</a>
    <h2>Usuários</h2>
   <table border='4px'>
    <form action="" method="post">
        <label for="pesquisa">Pesquisar:</label>
        <input type="search" name="pesquisa" id="pesquisa">
        <button type="submit" value="pesquisar">Buscar</button>
    </form>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Nome</th>
            <th>RG</th>
            <th>Matrícula</th>
            <th>Turma</th>
            <th>Ação</th>
        </tr>
    <?php 
        foreach($data as $key => $value){
            echo "<tr>";
            echo "<td>{$value['id']}</td>";
            echo "<td>{$value['login']}</td>";
            echo "<td>{$value['nome']}</td>";
            echo "<td>{$value['rg']}</td>";
            echo "<td>{$value['matricula']}</td>";
            echo "<td>{$value['turma']}</td>";
            echo "<td><a href='index.php?acao=editar&id={$value['id']}'>Editar</a>";
            echo "||<a href='acao.php?acao=apagar&id={$value['id']}'>Apagar</a></td>";
        }
        echo "</tr>";
    ?>
   </table>
</body>
</html>