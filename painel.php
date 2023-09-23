<!-- Concexão com Banco de Dados -->
<?php
include 'conexao/bancodados.php';

include 'CRUD/atualizar_chamado.php';
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

  <style>
    #rolagem {
      max-height: 490px;
      /* Defina a altura máxima desejada */
      overflow-y: scroll;
      /* Adicione uma barra de rolagem vertical quando necessário */
    }
  </style>
</head>

<body>
  <!-- link do Menu -->
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <?php include 'conexao/menu/menu.php' ?>
  </header>
  <!-- Fim link do Menu -->

  <div class="container-fluid">
    <div class="row">
      <!-- link do Barra Lateral -->
      <?php include 'conexao/menu/barralateral.php' ?>
      <!-- Fim link do Barra Lateral -->

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-2">
        <!-- Topo -->
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Painel de Chamado</h1>
          <div class="btn-toolbar mb-2 mb-md-0">

            <!-- botão de Chamado -->
            <button type="button" class="btn btn-sm btn-outline-secondary">
              <a href="CRUD/fromul_Chamado.php" class="btn btn-sm">Abrir Chamado</a>
            </button>
            <!-- Fim botão de Chamado -->

          </div>
        </div>
        <!-- Fim do Topo -->
        <div class="container-fluid">
          <!-- Filtro -->
          <div class="dropdown-menu d-block position-static shadow d-grid gap-4" style=" float: left;">
            <div class="bg-body-tertiary border rounded-3">
              <div class="dropdown-menu d-block position-static pt-0 mx-0 rounded-3 shadow overflow-hidden w-280px">
                <div class="bg-body-tertiary border rounded-3">
                  <h5 style="text-align: center;">Status</h5>
                </div>
                <!-- link do Filtro Pro Status -->
                <?php include 'conexao/filtro/status/filtra_status.php' ?>
                <!-- Fim link do Filtro Pro Status -->
              </div>
            </div>

            <div class="bg-body-tertiary border rounded-3">
              <div class="dropdown-menu d-block position-static pt-0 mx-0 rounded-3 shadow overflow-hidden w-280px">
                <div class="bg-body-tertiary border rounded-3">
                  <h5 style="text-align: center;">Loja</h5>
                </div>
                <!-- link do Filtro Pro Loja -->
                <?php include 'conexao/filtro/loja/filtra_loja.php' ?>
                <!-- Fim link do Filtro Pro Loja -->
              </div>
            </div>
          </div>
          <!-- Fim Dos Filtro -->

          <!-- Lista de Chamado -->
          <div id="rolagem" class="dropdown-menu d-block position-static shadow" style="margin-left: 16em;">
            <h5 style="text-align: center;">Lista de Chamado</h5>
            <div class="table-responsive small">
              <?php
              // Verifique se um filtro de status foi especificado na URL
              $filtro_status = isset($_GET["status"]) ? $_GET["status"] : null;

              // Construa a consulta SQL com base no filtro de status
              $sql = "SELECT * FROM tb_chamado";

              if ($filtro_status) {
                $sql .= " WHERE status = '$filtro_status'";
              }

              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                echo "<table class='table table-striped table-sm table-bordered'>";
                echo "<thead>";
                echo "<tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Loja</th>
                      <th>Setor</th>
                      <th>Problema</th>
                      <th>TeamViewer</th>
                      <th>Data</th>
                      <th>Status</th>
                    </tr>";
                echo "</thead>";
                echo  "<tbody id='tabela-chamado'>";
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["id"] . "</td>";
                  echo "<td>" . $row["nome"] . "</td>";
                  echo "<td>" . $row["loja"] . "</td>";
                  echo "<td>" . $row["setor"] . "</td>";
                  echo "<td>" . $row["problema"] . "</td>";
                  echo "<td>" . $row["teamviewer"] . "</td>";
                  echo "<td>" . $row["data"] . "</td>";
                  echo "<td>" . $row["status"] . "</td>";
                  echo "<td><a class='btn btn-sm btn-outline-primary dropdown-toggle' href='CRUD/altera_formulario?id=" . $row["id"] . "'>Editar</a></td>";
                  echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
              } else {
                echo "Nenhum chamado cadastrado.";
              }

              // Feche a conexão com o banco de dados
              ?>
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

  <script src="js/filtrocham.js"></script>
</body>

</html>