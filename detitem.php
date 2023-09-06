<?php
include 'conexao/bancodados.php';

include 'CRUD/cadastro.php';


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM tb_item WHERE id = $id");
    echo "<script>alert('Registro excluído com sucesso.');</script>";
    header('location:index.php');
}

?>

<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">

    <title>Dashboard Template</title>

    <link href="css/dist/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>
    <!-- link do Menu -->
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <?php include 'conexao/menu.php' ?>
    </header>
    <!-- Fim do Menu -->
    <div class="container-fluid">
        <div class="row">
            <!-- Link Barra Lateral -->
            <?php include 'conexao/barralateral.php' ?>
            <!-- Fim Barra Lateral -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="album py-5 bg-light">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">

                            <?php

                            $select = mysqli_query($conn, "SELECT * FROM tb_item");

                            ?>
                            <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                                <div class="col">
                                    <div class="card shadow-sm">
                                        <a href="detalhe.php"> <img src="img/<?php echo $row['imagem']; ?>" height="218" alt=""> </a>
                                        <div class="card-body">
                                            <p class="card-text"><?php echo $row['nome']; ?>.</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">

                                                    <a href="CRUD/altera.php?edit=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-secondary"> <i class="fas fa-edit"></i> editar </a>
                                                    <a href="index.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-secondary"> <i class="fas fa-trash"></i> deletar </a>

                                                </div>
                                                <small class="text-muted">9 Quant</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="js/dashboard.js"></script>
    <script src="js/dist/bootstrap.bundle.min.js"></script>
    <script src="js/dist/feather.min.js"></script>
    <script src="js/dist/chart.min.js"></script>

</body>

</html>