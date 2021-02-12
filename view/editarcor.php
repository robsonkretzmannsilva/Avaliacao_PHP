<?php require __DIR__ . "/../source/autoload.php";

use Source\Models\Colors;

$color = new Colors();
if (filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING)) {
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
    $colors = $color->findid($id);
}

$message = null;

if (filter_input(INPUT_POST, "name_color", FILTER_SANITIZE_STRING)) {
    $message = $color->update(filter_input(INPUT_POST, "name_color", FILTER_SANITIZE_STRING), $id);
    $colors = $color->findid($id);
}
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

    <link href="../style/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../style/multi.min.css">
    <script src="../style/multi.min.js"></script>

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

    <div class="album py-5 bg-light">
        <?php if ($message): ?>
            <p class="badge-success"><?= $message ?></p>
        <?php endif; ?>
        <form method="post" name="frmfrutas" action="#" id="frmfrutas">
            <div class="container">
                <div class="form-group row">
                    <label class="col-form-label">Cor </label>
                    <div class="col-sm-6">
                        <?php if ($colors): ?>
                            <?php foreach ($colors as $item): ?>
                                <input type="text" name="name_color" class="form-control" value="<?= $item->name ?>">
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>


                <div class="form-group row">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Gravar
                    </button>
                    &nbsp;
                    <a href="Cores.php" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-dot-circle-o"></i>
                        Cancelar
                    </a>
                </div>
            </div>


        </form>
    </div>

</main>

<footer class="text-muted">
    <div class="container">

    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
    var select = document.getElementById('fruit_select');
    multi(select);
</script>
</body>
</html>


