<!-- Concexão com Banco de Dados -->
<?php
include '../../CONEXAO/bancodados.php';

$id = $_GET['detalhe'];

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
    <link rel="icon" href="../../IMG/ICONE/icone.jpg" sizes="16x16" type="image/jpg">

    <!-- Links CSS -->
    <link href="../../CSS/DIST/bootstrap.min.css" rel="stylesheet">
    <link href="CSS/styles.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../CSS/dashboard.css" rel="stylesheet">
    <link href="../../CSS/estilos.css" rel="stylesheet">
</head>

<body>
    <!-- link do Menu -->
    <header style="max-height: 300px;" class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <?php include '../../CONEXAO/NAV/menu.php' ?>
    </header>
    <!-- Fim link do Menu -->

    <div class="container-fluid">
        <div class="row">
            <!-- link do Barra Lateral -->
            <?php include '../../CONEXAO/NAV/barralateral.php' ?>
            <!-- Fim link do Barra Lateral -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-2">
                <!-- Topo -->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Criar novo Laudo</h1>
                </div>
                <!-- Fim do Topo -->
                <?php
                $select = mysqli_query($conn, "SELECT * FROM tb_estoque WHERE id = '$id'");
                ?>
                <br>
                <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                    <!-- Modal -->
                    <div class="col-md-8 col-lg-7" style="margin: auto">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form method="POST" action="../CADASTRA/cadastra_manutencao.php?detalhe=<?php echo $row['id']; ?>" enctype="multipart/form-data">
                                        <div class="row g-3">
                                            <?php
                                            $selectD = mysqli_query($conn, "SELECT * FROM tb_estoque WHERE id = '$id'");
                                            ?>
                                            <div class="col-sm-12">
                                                <label for="descricaoM" class="form-label">ITEM / Descrição</label>
                                                <div class="input-group has-validation">

                                                    <div class="col-sm-3">
                                                        <div class="input-group has-validation">
                                                            <input class="input-group-text" type="text" id="iditem" name="iditem" value="<?php echo $row['id_item']; ?>" required readonly>
                                                        </div>
                                                    </div>

                                                    <?php while ($row = mysqli_fetch_assoc($selectD)) { ?>
                                                        <input type="text" class="form-control" value="<?php echo $row['descricaoE']; ?>" id="descricaoM" name="descricaoM" required readonly>
                                                    <?php } ?>
                                                </div>
                                                <div class="invalid-feedback">
                                                    descriçao válido é obrigatório.
                                                </div>
                                            </div>

                                            <?php
                                            $selectN = mysqli_query($conn, "SELECT * FROM tb_estoque WHERE id = '$id'");
                                            ?>
                                            <div class="col-12">
                                                <div class="col-sm-12">
                                                    <label for="nserieM" class="form-label">N° de Serie</label>
                                                    <div class="input-group has-validation">
                                                        <?php while ($row = mysqli_fetch_assoc($selectN)) { ?>
                                                            <input type="text" class="form-control" value="<?php echo $row['nserieE']; ?>" id="nserieM" name="nserieM" required readonly>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        N° de Serie válido é obrigatório.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="fornecedor" class="form-label">Fornecedo</label>
                                                <select class="form-select" id="fornecedor" name="fornecedor" required>
                                                    <option value="">...</option>
                                                    <option>Casa Magalhaes</option>
                                                    <option>Techlibra</option>
                                                    <option>Tecnovetti</option>
                                                    <option>World Solutions</option>
                                                    <option>NPX</option>
                                                    <option>DBS</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    fornecedor válido
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="statusM" class="form-label">Status</label>
                                                <select class="form-select" id="statusM" name="statusM" required>
                                                    <option value="">...</option>
                                                    <option>Funcionando</option>
                                                    <option>Em Manutenção</option>
                                                    <option>Sem Conserto</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Selecione uma Loja válida.
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <label for="dataM" class="form-label">Data</label>
                                                <input type="datetime-local" class="form-control" id="dataM" name="dataM" required>
                                                <div class="invalid-feedback">
                                                    data do ladudo obrigatorio!
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="motivoM" class="form-label">Motivo</label>
                                                <textarea type="text-center" class="form-control" id="motivoM" name="motivoM" rows="3" required></textarea>
                                                <div class="invalid-feedback">
                                                    Selecione um Setor válido.
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="tecnicoM" class="form-label">Tecnico</label>
                                                <select class="form-select" id="tecnicoM" name="tecnicoM" required>
                                                    <option>...</option>
                                                    <option>Alex Fushi</option>
                                                    <option>Ewerton Sousa</option>
                                                    <option>Geroncio da Silva</option>
                                                    <option>Lucas Lima</option>
                                                    <option>Samuel Santos</option>
                                                    <option>Willian de Sousa</option>
                                                </select>
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
                <?php } ?>
                <!-- Fim Modal -->
            </main>
        </div>
    </div>
    <!-- Links JS -->
    <script src="../../JS/dashboard.js"></script>
    <script src="../../JS/DIST/bootstrap.bundle.min.js"></script>
    <script src="../../JS/DIST/feather.min.js"></script>
    <script src="../../JS/DIST/chart.min.js"></script>
    <script src="../../JS/eventos.js"></script>
</body>

</html>