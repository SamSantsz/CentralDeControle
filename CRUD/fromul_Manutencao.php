<?php
// Concexão com Banco de Dados
include '../conexao/bancodados.php';

$id = $_GET['detalhe'];
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
    <link rel="icon" href="../IMG/ICONE/icone.jpg" sizes="16x16" type="image/jpg">

    <!-- Links CSS -->
    <link href="../css/dist/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">
    <div class="container">
        <main>
            <!-- Imagem de Logo -->
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="../IMG/ICONE/morango.png" alt="morango" width="100" height="100">
                <h2>Formulário de Laudo da T.I</h2>
            </div>
            <!-- Fim da Imagem da Logo -->
            <br><br>
            <?php
            $select = mysqli_query($conn, "SELECT * FROM tb_estoque WHERE id = '$id'");
            ?>
            <div class="row g-5">
                <!-- Campo do Formulario -->
                <div class="col-md-8 col-lg-7" style="margin: auto">
                    <h3 class="mb-3">Laudo</h3>
                    <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                        <form method="POST" action="CADASTRA/cadastra_manutencao.php?detalhe=<?php echo $row['id']; ?>" class="needs-validation" novalidate>
                            <div class="row g-3">                                
                                <?php
                                $selectD = mysqli_query($conn, "SELECT * FROM tb_estoque WHERE id = '$id'");
                                ?>
                                <div class="col-sm-12">
                                    <label for="descricaoM" class="form-label">Descrição</label>
                                    <div class="input-group has-validation">
                                    <input class="input-group-text" type="text" id="iditem" name="iditem" value="<?php echo $row['id']; ?>" required readonly>
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
                                        <option>Em Manutenção</option>
                                        <option>Sem Concerto</option>
                                        <option>Funcionando</option>
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

                            <hr class="my-4">
                            <hr class="my-4">
                            <hr class="my-4">

                            <button class="w-100 btn btn-primary btn-lg" value="Salvar" type="submit">Salvar Laudo</button>
                        </form>
                    <?php } ?>
                </div>
                <!-- Fim Campo do Formulario -->
            </div>
        </main>
    </div>
    <br><br><br><br>
    <!-- Links JS -->
    <script src="../JS/dashboard.js"></script>
    <script src="../JS/DIST/bootstrap.bundle.min.js"></script>
    <script src="../JS/DIST/feather.min.js"></script>
    <script src="../JS/DIST/chart.min.js"></script>
</body>

</html>