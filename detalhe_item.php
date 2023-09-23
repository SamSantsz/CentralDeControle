<!-- Concexão com Banco de Dados -->
<?php
include 'conexao/bancodados.php';

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

    <title>Controle de Chamados</title>

    <!-- Links CSS -->
    <link href="css/dist/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">

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
    <header style="max-height: 300px;" class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <?php include 'conexao/menu/menu.php' ?>
    </header>
    <!-- Fim link do Menu -->

    <div class="container-fluid">
        <div class="row">
            <!-- link do Barra Lateral -->
            <?php include 'conexao/menu/barralateral.php' ?>
            <!-- Fim link do Barra Lateral -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-2">
                <!-- Painel de Item -->
                <?php
                $select = mysqli_query($conn, "SELECT * FROM tb_item WHERE id = '$id'");
                ?>
                <br>
                <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                    <div class=" d-block position-static shadow d-grid gap-4 col-3 col-md-3" style=" float: left;">
                        <div class="dropdown-menu d-block position-static pt-0 mx-0 rounded-3 shadow overflow-hidden w-280px">
                            <img class="img-thumbnail mb-3" alt="" width="480px" height="300" loading="lazy" src="img/<?php echo $row['imagem']; ?>" alt="">

                            <div class="bg-body-tertiary border rounded-3">
                                <h5 style="text-align: center;"><?php echo $row['descricao']; ?></h5>
                            </div>

                            <small class="text-muted">Quantidade : <?php echo $total_item ?> itens</small>

                            <!-- botão de modal -->
                            <button style="float: right; margin-right: 1em; margin-top: 1em;" type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <svg width="25" height="25" fill="currentColor" class="bi bi-database-fill-add" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0ZM8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z" />
                                    <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7Zm6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.552 4.552 0 0 1 .23-2.002Zm-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.507 4.507 0 0 1-1.3-1.905Z" />
                                </svg>
                            </button>
                            <!-- Fim botão de modal -->

                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar novo Item</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="CRUD/cadastra_estoque.php?detalhe=<?php echo $row['id']; ?>" enctype="multipart/form-data">
                                        <div class="row g-3">
                                            <div class="col-sm-12">
                                                <label for="iditem" class="form-label">ID Item</label>
                                                <input class="form-control" type="text" id="iditem" name="iditem" value="<?php echo $row['id']; ?>" required readonly>
                                                <div class="invalid-feedback">
                                                    Nome válido é obrigatório.
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="descricao" class="form-label">Descrição</label>
                                                <input class="form-control" type="text" id="descricao" name="descricao" value="<?php echo $row['descricao']; ?>" required readonly>
                                                <div class="invalid-feedback">
                                                    Nome válido é obrigatório.
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="nserie" class="form-label">N° Série</label>
                                                <input type="text" class="form-control" id="nserie" name="nserie" required>
                                                <div class="invalid-feedback">
                                                    Nome válido é obrigatório.
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="loja" class="form-label">Loja</label>
                                                <select class="form-select" id="loja" name="loja" required>
                                                    <option value="">Moranguinho...</option>
                                                    <option>Matriz</option>
                                                    <option>Avenida</option>
                                                    <option>São Francisco</option>
                                                    <option>Coneito</option>
                                                    <option>CD</option>
                                                    <option>Jangada Casc</option>
                                                    <option>Horizonte</option>
                                                    <option>Filial</option>
                                                    <option>Shopping</option>
                                                    <option>Jangada Hori</option>
                                                    <option>Barreira</option>
                                                    <option>Buriti</option>
                                                    <option>Beberibe</option>
                                                    <option>Nova Barreira</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Selecione uma Loja válida.
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="setor" class="form-label">Setor</label>
                                                <select class="form-select" id="setor" name="setor" required>
                                                    <option value="">Setor...</option>
                                                    <option>Frente de Loja</option>
                                                    <option>Recebimento</option>
                                                    <option>PDV</option>
                                                    <option>Salão</option>
                                                    <option>TI</option>
                                                    <option>Comercial Casc</option>
                                                    <option>DP</option>
                                                    <option>RH</option>
                                                    <option>Financeiro</option>
                                                    <option>Padaria</option>
                                                    <option>Chegue Pague</option>
                                                    <option>Frigorífico</option>
                                                    <option>Cartaz</option>
                                                    <option>DTI</option>
                                                    <option>Recepção</option>
                                                    <option>Preços</option>
                                                    <option>Entregas</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Selecione um Setor válido.
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="pdv" class="form-label">PDV <span class="text-body-secondary">(Optional)</span></label>
                                                <input type="number" class="form-control" id="pdv" name="pdv" placeholder="Caixa...">
                                            </div>

                                            <div class="col-md-4">

                                            </div>

                                            <div class="col-md-4">

                                            </div>

                                            <div class="col-md-4">
                                                <label for="situacao" class="form-label">Situação</label>
                                                <input type="text" class="form-control" id="situacao" name="situacao" placeholder="Funcionando" required readonly>
                                                <div class="invalid-feedback">
                                                    Situacao do Equipamento
                                                </div>
                                            </div>
                                        </div>
                                        <br>
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

                    <!-- Fim Painel de Item -->
                <?php } ?>

                <!-- Lista de Equipamento -->
                <div id="rolagem" class="dropdown-menu d-block position-static shadow offcanvas-body" style="margin-left: 16em;">
                    <h5 style="text-align: center;">Lista de Chamado</h5>
                    <div class="table-responsive small">
                        <?php
                        // Verifique se um filtro de status foi especificado na URL
                        $filtro_status = isset($_GET["id"]) ? $_GET["id"] : null;

                        // Construa a consulta SQL com base no filtro de status
                        $sql = "SELECT * FROM tb_estoque WHERE id_item = '$id'";

                        if ($filtro_status) {
                            $sql .= " WHERE status = '$filtro_status'";
                        }

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table class='table table-striped table-sm table-bordered'>";
                            echo "<thead>";
                            echo "<tr>
                                <th>ID</th>
                                <th>descricao</th>
                                <th>nserie</th>
                                <th>loja</th>
                                <th>setor</th>
                                <th>pdv</th>
                                <th>situacao</th>
                                </tr>";
                            echo "</thead>";
                            echo  "<tbody id='tabela-estoque'>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["descricao"] . "</td>";
                                echo "<td>" . $row["nserie"] . "</td>";
                                echo "<td>" . $row["loja"] . "</td>";
                                echo "<td>" . $row["setor"] . "</td>";
                                echo "<td>" . $row["pdv"] . "</td>";
                                echo "<td>" . $row["situacao"] . "</td>";
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