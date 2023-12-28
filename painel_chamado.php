<!-- Concexão com Banco de Dados -->
<?php
include 'CONEXAO/bancodados.php';

include 'CRUD/ALTERA/atualizar_chamado.php';
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

  <title>Controle de Controle</title>
  <!-- Favicons -->
  <link rel="icon" href="IMG/ICONE/icone.jpg" sizes="16x16" type="image/jpg">

  <!-- Links CSS -->
  <link href="CSS/DIST/bootstrap.min.css" rel="stylesheet">
  <link href="CSS/styles.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="CSS/dashboard.css" rel="stylesheet">

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
    <?php include 'CONEXAO/NAV/menu.php' ?>
  </header>
  <!-- Fim link do Menu -->

  <div class="container-fluid">
    <div class="row">
      <!-- link do Barra Lateral -->
      <?php include 'CONEXAO/NAV/barralateral.php' ?>
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
          <div class="d-block position-static shadow gap-12 col-12 col-md-3" style=" float: left;">
            <div class="dropdown-menu d-block position-static pt-0 mx-0 rounded-3 shadow overflow-hidden w-280px">
              <div class="bg-body-tertiary border rounded-3">
                <h5 style="text-align: center;">Status</h5>
              </div>
              <?php include 'CONEXAO/FILTRO/STATUS/filtro_status.php' ?>
            </div>
            <!-- link dos Cliente -->
            <button style="margin: 1em; margin-left: 2em;" type="button" class="btn btn-sm btn-outline-danger">
              <a href="CRUD/fromul_ChamClient.php" class="btn btn-sm"><strong>Formulario Para frente de Loja</strong></a>
            </button>
          </div>
          <!-- Fim Dos Filtro -->

          <!-- Lista de Chamado -->
          <div class="dropdown-menu d-block position-static shadow d-grid gap-12 col-12 col-md-9">
            <h5 style="text-align: center;">Lista de Chamado</h5>
            <div id="rolagem" class="table-responsive small">
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
                      <th>Direcionar</th>
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
                  // echo '<td><img src="IMG/CHAMADO' . $row["imagem"] . '" width="100"></td>';
                  echo "<td><a class='btn btn-sm btn-outline-primary dropdown-toggle' href='CRUD/ALTERA/altera_formulario?id=" . $row["id"] . "'>Editar</a></td>";
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
        <hr>
      </main>
    </div>
  </div>
  <!-- Links JS -->
  <script src="JS/dashboard.js"></script>
  <script src="JS/DIST/bootstrap.bundle.min.js"></script>
  <script src="JS/DIST/feather.min.js"></script>
  <script src="JS/DIST/chart.min.js"></script>

  <script src="JS/filtrocham.js"></script>
</body>

</html>