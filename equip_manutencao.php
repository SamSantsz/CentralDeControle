<?php
// Concexão com Banco de Dados
include 'CONEXAO/bancodados.php';

include 'CRUD/ALTERA/atualizar_manutencao.php';
?>

<!doctype html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.108.0">

  <title>Controle de Controle</title>
  <link rel="icon" href="IMG/ICONE/icone.jpg" sizes="16x16" type="image/jpg">

  <!-- Links CSS -->
  <link href="CSS/DIST/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="CSS/styles.css" rel="stylesheet">
  <link href="CSS/dashboard.css" rel="stylesheet">

  <style>
    #rolagemMan {
      max-height: 490px;
      /* Defina a altura máxima desejada */
      overflow-y: scroll;
      /* Adicione uma barra de rolagem vertical quando necessário */
    }
  </style>

  <?php
  // Definir a cor com base no status
  $query = "SELECT statusM FROM tb_manutencao";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $status = $row['statusM'];
      $cor = '';

      // Definir a cor com base no status
      if ($status == 'Em Manutenção') {
        $cor = 'orange';
      } elseif ($status == 'Funcionando') {
        $cor = 'green';
      } elseif ($status == 'Sem Conserto') {
        $cor = 'red';
      }
    }
  }
  ?>
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
          <h1 class="h2">Equipamentos Em Manutenção</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <!-- botão de modal -->
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="modal" data-bs-target="#Modalmanut">
              <a href="CRUD/fromul_Manutencao.php" class="btn btn-sm">Cadastrar</a>
            </button>
            <!-- Fim botão de modal -->
          </div>
        </div>
        <!-- Fim do Topo -->

        <!-- Painel de Item -->
        <div class="album py-1 bg-light">
          <div class="container">
            <div class="row-cols-1 row-cols-sm-12 row-cols-md-12 g-3">
              <!-- Fim da Lista -->
              <!-- Lista de Equipamento Em Manutenção -->
              <div class="dropdown-menu d-block position-static shadow offcanvas-body">
                <h5 style="text-align: center;">Lista de Equipamento Em Manutenção</h5>
                <div id="rolagemMan" class="table-responsive small">
                  <?php
                  // Verifique se um filtro de status foi especificado na URL
                  $filtro_status = isset($_GET["statusM"]) ? $_GET["statusM"] : null;

                  // Construa a consulta SQL com base no filtro de status WHERE statusM = 'Em Manutenção' OR statusM = 'Sem Conserto'
                  $sql = "SELECT * FROM tb_manutencao ";

                  if ($filtro_status) {
                    $sql .= " WHERE statusM = 'Em Manutenção'";
                  }

                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    echo "<table class='table table-striped table-sm table-bordered'>";
                    echo "<thead>";
                    echo "<tr>
                            <th>ID</th>
                            <th>Descrição</th>
                            <th>N° Serie</th>
                            <th>Fornecedor</th>
                            <th>Situacao</th>
                            <th>Motivo</th>
                            <th>Data</th>
                            <th>Tecnico</th>
                            <th>Imagem</th>
                            <th>Atualizar</th>                    
                          </tr>";
                    echo "</thead>";
                    echo  "<tbody id='tabela-chamado'>";
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $row["id"] . "</td>";
                      echo "<td>" . $row["descricaoM"] . "</td>";
                      echo "<td>" . $row["nserieM"] . "</td>";
                      echo "<td>" . $row["fornecedor"] . "</td>";
                      echo "<td style='color: orange; font-weight: bold;'>" . $row["statusM"] . "</td>";
                      echo "<td>" . $row["motivoM"] . "</td>";
                      echo "<td>" . $row["dataM"] . "</td>";
                      echo "<td>" . $row["tecnicoM"] . "</td>";
                      //echo '<td><img src="IMG/' . $row["imagemI"] . '" width="100"></td>';
                      echo "<td><a class='btn btn-sm btn-outline-primary dropdown-toggle' href='CRUD/ALTERA/altera_manutencao?id=" . $row["id"] . "'>Editar</a></td>";
                      echo "<td><a type='button' class='btn btn-sm btn-outline-primary dropdown-toggle' href='pdf.php?id=" . $row["id"] . "'>PDF</a></td>";
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
              <!-- Fim da Lista-->
            </div>
          </div>
        </div>
        <!-- Fim Painel de Item -->

      </main>
    </div>
  </div>
  <!-- Links JS -->
  <script src="JS/dashboard.js"></script>
  <script src="JS/DIST/bootstrap.bundle.min.js"></script>
  <script src="JS/DIST/feather.min.js"></script>
  <script src="JS/DIST/chart.min.js"></script>
  <script src="JS/eventos.js"></script>
</body>

</html>