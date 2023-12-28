<!-- Concexão com Banco de Dados -->
<?php
include 'CONEXAO/bancodados.php';

$id = $_GET['detalhe'];

// <!-- Contador de Item -->

// Consulta SQL para contar o número de registros na tabela chamados
$contagem_sql = "SELECT COUNT(*) AS total FROM tb_estoque WHERE id_item = $id";
$contagem_result = $conn->query($contagem_sql);

if ($contagem_result->num_rows == 1) {
    $contagem_row = $contagem_result->fetch_assoc();
    $total_item = $contagem_row["total"];
} else {
    echo "Erro ao contar os chamados.";
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

    <title>Controle de Controle</title>
    <link rel="icon" href="IMG/ICONE/icone.jpg" sizes="16x16" type="image/jpg">

    <!-- Links CSS -->
    <link href="CSS/DIST/bootstrap.min.css" rel="stylesheet">
    <link href="CSS/styles.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="CSS/dashboard.css" rel="stylesheet">
    <link href="CSS/estilos.css" rel="stylesheet">

    <style>
        #rolagem {
            max-height: 490px;
            /* Defina a altura máxima desejada */
            overflow-y: scroll;
            /* Adicione uma barra de rolagem vertical quando necessário */
        }

        #rolagemMan {
            max-height: 163px;
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
    <header style="max-height: 300px;" class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <?php include 'CONEXAO/NAV/menu.php' ?>
    </header>
    <!-- Fim link do Menu -->

    <div class="container-fluid">
        <div class="row">
            <!-- link do Barra Lateral -->
            <?php include 'CONEXAO/NAV/barralateral.php' ?>
            <!-- Fim link do Barra Lateral -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-2">
                <?php

                $select = mysqli_query($conn, "SELECT * FROM tb_estoque WHERE id = '$id'");

                ?>
                <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                    <!-- Topo -->
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Equipamentos Em Manutenção</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <!-- botão de modal -->
                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="modal" data-bs-target="#Modalmanut">
                                <a href="CRUD/fromul_Manutencao.php?detalhe=<?php echo $row['id']; ?>" class="btn btn-sm">Cadastrar</a>
                            </button> -->
                            <!-- Fim botão de modal -->
                        </div>
                    </div>
                    <!-- Fim do Topo -->
                <?php } ?>

                <!-- Painel de Item -->
                <?php
                $select = mysqli_query($conn, "SELECT * FROM tb_item WHERE id = '$id'");
                ?>
                <br>
                <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                    <div class="d-block position-static shadow gap-4 col-12 col-md-3" style=" float: left;">
                        <div class="dropdown-menu d-block position-static pt-0 mx-0 rounded-3 shadow overflow-hidden w-280px">
                            <img class="img-thumbnail mb-3" alt="" width="480px" height="300" loading="lazy" src="IMG/EQUIPAMENTO/<?php echo $row['imagemI']; ?>" alt="">

                            <div class="bg-body-tertiary border rounded-3">
                                <h5 style="text-align: center;"><?php echo $row['descricaoI']; ?></h5>
                            </div>

                            <small class="text-muted">Quantidade : <?php echo $total_item ?> itens</small>

                            <!-- botão de modal -->
                            <button style="float: right; margin-right: 1em; margin-top: 1em;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                                <svg width="25" height="25" fill="currentColor" class="bi bi-database-fill-add" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0ZM8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z" />
                                    <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7Zm6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.552 4.552 0 0 1 .23-2.002Zm-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.507 4.507 0 0 1-1.3-1.905Z" />
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
                                    <?php include 'CRUD/fromul_nvitem.php' ?>
                                </div>
                            </div>
                            <!-- Fim Modal -->
                        </div>
                    </div>



                    <!-- Fim Painel de Item -->
                <?php } ?>

                <!-- Lista de Equipamento -->
                <div id="rolagem" class="dropdown-menu d-block position-static shadow d-grid gap-12 col-12 col-md-9">
                    <h5 style="text-align: center;">Lista de Equipamento</h5>
                    <div class="table-responsive small">
                        <?php
                        // Verifique se um filtro de status foi especificado na URL
                        $filtro_status = isset($_GET["Funcionando"]) ? $_GET["Funcionando"] : null;

                        // Construa a consulta SQL com base no filtro de status
                        $sql = "SELECT * FROM tb_estoque WHERE id_item = '$id' AND statusE = 'Funcionando'";

                        if ($filtro_status) {
                            $sql .= "WHERE statusE = '$filtro_statu'";
                        }

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table class='table table-striped table-sm table-bordered'>";
                            echo "<thead>";
                            echo "<tr>
                                    <th>ID</th>
                                    <th>Descricao</th>
                                    <th>N° Serie</th>
                                    <th>Loja</th>
                                    <th>Setor</th>
                                    <th>PDV</th>
                                    <th>Situacao</th>
                                </tr>";
                            echo "</thead>";
                            echo  "<tbody id='tabela-chamado'>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["descricaoE"] . "</td>";
                                echo "<td>" . $row["nserieE"] . "</td>";
                                echo "<td>" . $row["lojaE"] . "</td>";
                                echo "<td>" . $row["setorE"] . "</td>";
                                echo "<td>" . $row["pdvE"] . "</td>";
                                // echo "<td>" . $row["statusM"] . "</td>";
                                echo "<td><a type='button' class='btn btn-sm btn-outline-primary dropdown-toggle' href='CRUD/ALTERA/altera_mcitem.php?detalhe=" . $row["id"] . "'>Editar</a></td>";
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

                <!-- Fim da Lista -->
                <hr>

                <!-- Lista de Equipamento Em Manutenção -->
                <div class="dropdown-menu d-block position-static shadow offcanvas-body">
                    <h5 style="text-align: center;">Lista de Equipamento Em Manutenção</h5>
                    <div id="rolagemMan" class="table-responsive small">
                        <?php
                        // Verifique se um filtro de status foi especificado na URL
                        $filtro_status = isset($_GET["statusM"]) ? $_GET["statusM"] : null;

                        // Construa a consulta SQL com base no filtro de status
                        $sql = "SELECT * FROM tb_manutencao WHERE id_item = '$id' AND statusM = 'Em Manutenção'";

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
                                </tr>";
                            echo "</thead>";
                            echo  "<tbody id='tabela-chamado'>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["descricaoM"] . "</td>";
                                echo "<td>" . $row["nserieM"] . "</td>";
                                echo "<td>" . $row["fornecedor"] . "</td>";
                                echo "<td style='color: $cor;font-weight: bold;'>" . $row["statusM"] . "</td>";
                                echo "<td>" . $row["motivoM"] . "</td>";
                                echo "<td>" . $row["dataM"] . "</td>";
                                echo "<td>" . $row["tecnicoM"] . "</td>";
                                // echo "<td>" . $row["situacaoE"] . "</td>";
                                //echo "<td><a type='button' class='btn btn-sm btn-outline-secondary dropdown-toggle' data-bs-toggle='modal' data-bs-target='#edmanutencaoModal'>Editar</a></td>";
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