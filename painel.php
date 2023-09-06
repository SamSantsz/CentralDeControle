<!-- Concexão com Banco de Dados -->
<?php
include 'conexao/bancodados.php';

include 'CRUD/caditem.php';


if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM tb_item WHERE id = $id");
  echo "<script>alert('Registro excluído com sucesso.');</script>";
  header('location:index.php');
}

?>
<!-- Fim Concexão com Banco de Dados -->

<!doctype html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.108.0">

  <title>Controle de Chamados</title>

  <!-- Links CSS -->
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
  <!-- Fim link do Menu -->

  <div class="container-fluid">
    <div class="row">
      <!-- link do Barra Lateral -->
      <?php include 'conexao/barralateral.php' ?>
      <!-- Fim link do Barra Lateral -->

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <!-- Topo -->
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Painel de Chamado</h1>
          <div class="btn-toolbar mb-2 mb-md-0">

            <!-- botão de Chamado -->
            <button type="button" class="btn btn-sm btn-outline-secondary">
              <a href="CRUD/fromChamado.php" class="btn btn-sm">Abri Chamado</a>
            </button>
            <!-- Fim botão de Chamado -->

          </div>
        </div>
        <!-- Fim do Topo -->
        <div class="container-fluid">
          <!-- Filtro -->
          <div class="dropdown-menu d-block position-static shadow d-grid gap-4" style=" float: left;">
            <div class="bg-body-tertiary border rounded-3">
              Status
            </div>
            <div class="bg-body-tertiary border rounded-3">
              Lojas
            </div>
          </div>
          <!-- Fim Dos Filtro -->
          <!-- Lista de Chamado -->
          <div class="dropdown-menu d-block position-static shadow" style="margin-left: 11em;">
            <h5>Lista de Chamado</h5>
            <div class="table-responsive small">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Data de Criação</th>
                    <th scope="col">Loja</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tecnico</th>
                    <th scope="col">Problema</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          <!-- Fim da Lista de Chamado -->
        </div>
      </main>
    </div>
  </div>
  <!-- Links JS -->
  <script src="js/dashboard.js"></script>
  <script src="js/dist/bootstrap.bundle.min.js"></script>
  <script src="js/dist/feather.min.js"></script>
  <script src="js/dist/chart.min.js"></script>

</body>

</html>