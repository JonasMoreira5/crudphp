<!doctype html>
<html lang="py-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Usuários</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="stylo.css">
</head>

<body>
    <?php
    // incluir arquivo de configuração
    require 'config.php';

    $lista = [];
    $sql = $pdo->query("SELECT * FROM usuario"); // Consulta ao banco de dados
    if ($sql->rowCount() > 0) {
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>

    <h1>Listagem de Usuários</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>

        <!-- Mostar as informações -->
        <?php foreach ($lista as $usuario) : ?>
            <tr>
                <!-- Mostrando o campo de acordo com o array de informações -->
                <td><?= $usuario['id']; ?></td>
                <td><?= $usuario['nome']; ?></td>
                <td><?= $usuario['email']; ?></td>
                <td>
                    <!-- Ações com botões para exluir e editar-->
                    <a href="editar.php?id=<?= $usuario['id']; ?>">[Editar]</a>
                    <a href="excluir.php?id=<?= $usuario['id']; ?>">[Excluir]</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

    <a href="cadastrar.php">Cadastrar Usuário</a>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>