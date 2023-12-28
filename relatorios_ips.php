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
          <h1 class="h2">Relatorio de IP's</h1>
          <div class="btn-toolbar mb-2 mb-md-0">

            <!-- botão de modal -->
            <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
              <svg width="30" height="30" fill="currentColor" class="bi bi-bezier2" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 2.5A1.5 1.5 0 0 1 2.5 1h1A1.5 1.5 0 0 1 5 2.5h4.134a1 1 0 1 1 0 1h-2.01c.18.18.34.381.484.605.638.992.892 2.354.892 3.895 0 1.993.257 3.092.713 3.7.356.476.895.721 1.787.784A1.5 1.5 0 0 1 12.5 11h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5H6.866a1 1 0 1 1 0-1h1.711a2.839 2.839 0 0 1-.165-.2C7.743 11.407 7.5 10.007 7.5 8c0-1.46-.246-2.597-.733-3.355-.39-.605-.952-1-1.767-1.112A1.5 1.5 0 0 1 3.5 5h-1A1.5 1.5 0 0 1 1 3.5v-1zM2.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10 10a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
              </svg>
            </button>
            <!-- Fim botão de modal -->
            <!-- Modal -->
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Cadastrar novo Item</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <?php include 'CRUD/fromul_ips.php' ?>
              </div>
            </div>
            <!-- Fim Modal -->

          </div>
        </div>
        <!-- Fim do Topo -->
        <div class="container-fluid">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Caixas
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <?php include 'CONEXAO/FILTRO/IP/CAIXA/ip_caixa.php' ?>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Computador
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <?php include 'CONEXAO/FILTRO/IP/COMPUTADOR/ip_computador.php' ?>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Telefone
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <?php include 'CONEXAO/FILTRO/IP/TELEFONE/ip_telefone.php' ?>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  MFE
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <?php include 'CONEXAO/FILTRO/IP/MFE/ip_mfe.php' ?>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="TitleFifth">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifth" aria-expanded="false" aria-controls="collapseFour">
                  Impressora
                </button>
              </h2>
              <div id="collapseFifth" class="accordion-collapse collapse" aria-labelledby="TitleFifth" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <?php include 'CONEXAO/FILTRO/IP/IMPRESSORA/ip_impressora.php' ?>
                </div>
              </div>
            </div>
          </div>
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