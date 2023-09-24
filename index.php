<?php
// Concexão com Banco de Dados
include 'conexao/bancodados.php';

// CRUD Cadastra Item
include 'CRUD/CADASTRA/cadastra_item.php';

// Concexão com Banco de Dados

?>


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

  <!-- Custom styles for this template -->  
  <link href="css/styles.css" rel="stylesheet">
  <link href="css/dashboard.css" rel="stylesheet">
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
          <h1 class="h2">Equipamentos</h1>
          <div class="btn-toolbar mb-2 mb-md-0">

            <!-- botão de modal -->
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Cadastrar
            </button>
            <!-- Fim botão de modal -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="h2">Cadastrar novo Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="CRUD/CADASTRA/cadastra_item.php" enctype="multipart/form-data">
                      <h5><label for="nome">Descrição:</label><br></h5>
                      <input type="text" name="nome" class="form-control" required><br><br>
                      <h5><label for="imagem">Imagem:</label><br></h5>
                      <input type="file" name="imagem" class="form-control" required><br><br>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fecha</button>
                        <input type="submit" value="Salvar" class="btn btn-primary">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- Fim Modal -->
          </div>
        </div>
        <!-- Fim do Topo -->

        <!-- Painel de Item -->
        <div class="album py-5 bg-light">
          <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">

              <?php

              $select = mysqli_query($conn, "SELECT * FROM tb_item");

              ?>
              <?php while ($row = mysqli_fetch_assoc($select)) { ?>

                <div class="col-3 col-md-3">
                  <div class="card shadow-sm" id='tabela-estoque'>
                    <div>
                      <a href="detalhe_item.php?detalhe=<?php echo $row['id']; ?>"> <img class="img-fluid" src="img/<?php echo $row['imagem']; ?>" alt=""> </a>
                    </div>
                    <!-- class="img-fluid" height="289" width="289"-->
                    <div class="card-body">

                      <p class="card-text"><?php echo $row['descricao']; ?>.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">

                          <a href="CRUD/ALTERA/altera_item.php?edit=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-secondary"> <i class="fas fa-edit"></i> editar </a>
                          <a href="CRUD/EXCLUIR/excluir_item.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-secondary"> <i class="fas fa-trash"></i> deletar </a>

                        </div>
                        <small class="text-muted">ITEM : <?php echo $row['id']; ?></small>
                      </div>
                    </div>
                  </div>
                </div>

              <?php } ?>
            </div>
          </div>
        </div>
        <!-- Fim Painel de Item -->

      </main>
    </div>
  </div>
  <!-- Links JS -->
  <script src="js/dashboard.js"></script>
  <script src="js/dist/bootstrap.bundle.min.js"></script>
  <script src="js/dist/feather.min.js"></script>
  <script src="js/dist/chart.min.js"></script>
  <script src="js/eventos.js"></script>
</body>

</html>