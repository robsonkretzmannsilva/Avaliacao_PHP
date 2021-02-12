<?php require __DIR__ . "/source/autoload.php";

use Source\Models\User;

$user = (new User())->all();

?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Cadastro de Usuarios e Relação de cores</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">
    <link href="style/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>

<header>

    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">

        </div>
    </div>
</header>

<main role="main">

    <section class="jumbotron text-center">
        <h1>
            Cadastro de Usuários e Relação de Cores
        </h1>

    </section>
    <div class="container">
        <a href="view/cadastrar.php" class="btn btn-primary">Cadastrar Usuario</a>
        <a href="view/Cores.php" class="btn btn-success">Adicionar Cores</a>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
            <table class="table table-bordered table-striped">
                <thead>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
                </thead>
                <tbody id="myTable">
                <?php if ($user): ?>
                    <?php foreach ($user as $users): ?>
                        <tr>
                            <td><?= $users->name ?></td>
                            <td><?= $users->email ?></td>
                            <td><a href="view/editar.php?id=<?= $users->id ?>" data-toggle="tooltip"
                                   title="Editar"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="view/deletar.php?id=<?= $users->id ?>" data-toggle="tooltip"
                                   title="Deletar"><i class="bi bi-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="alert-success align-items-center">Não Existe dados a Listar</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>


        </div>

    </div>

</main>

<footer class="text-muted">
    <div class="container">

    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

</script>
</body>
</html>
