<?php
include '../../CONEXAO/bancodados.php';
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">

    <title>Controle de Controle</title>
    <!-- Favicons -->
    <link rel="icon" href="../../IMG/ICONE/icone.jpg" sizes="16x16" type="image/jpg">

    <!-- Links CSS -->
    <link href="../../CSS/DIST/bootstrap.min.css" rel="stylesheet">
    <link href="../../CSS/styles.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../CSS/dashboard.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">
    <!-- Imagem de Logo -->
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../../IMG/ICONE/morango.png" alt="" width="100" height="100">
        <h2>Formulário de laudo da T.I</h2>
    </div>
    <!-- Fim da Imagem da Logo -->
    <br><br>

    <?php
    // Verifique se o ID do chamado foi passado como parâmetro
    if (isset($_GET["id"])) {
        $chamado_id = $_GET["id"];

        // Consulta SQL para recuperar os dados do chamado com base no ID
        $sql = "SELECT * FROM tb_manutencao WHERE id = $chamado_id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Exiba um formulário de edição preenchido com os dados atuais do chamado
    ?>

            <div class="col-md-8 col-lg-7" style="margin: auto">
                <h3 class="mb-3">Editar Laudo</h3>
                <form action="../../equip_manutencao.php" method="POST">
                    <div class="row g-3">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="id_item" value="<?php echo $row['id_item']; ?>">

                        <div class="col-sm-12">
                            <label for="descricaoM" class="form-label">descricaoM</label>
                            <input class="form-control" type="text" id="descricaoM" name="descricaoM" value="<?php echo $row['descricaoM']; ?>" required readonly>
                        </div>

                        <div class="col-12">
                            <label for="nserieM" class="form-label">nserieM</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">#</span>
                                <input class="form-control" type="text" id="nserieM" name="nserieM" value="<?php echo $row['nserieM']; ?>" required readonly>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="fornecedor" class="form-label">fornecedor</label>
                            <select class="form-select" id="fornecedor" name="fornecedor" required>
                                <option value="<?php echo $row['fornecedor']; ?>"> <?php echo $row['fornecedor']; ?> </option>
                                <option>Casa Magalhaes</option>
                                <option>Techlibra</option>
                                <option>Tecnovetti</option>
                                <option>World Solutions</option>
                                <option>NPX</option>
                                <option>DBS</option>
                            </select>
                            <div class="invalid-feedback">
                                Selecione um Setor válido.
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="statusM" class="form-label">statusM</label>
                            <select class="form-select" id="statusM" name="statusM" required>
                                <option value="<?php echo $row['statusM']; ?>"> <?php echo $row['statusM']; ?> </option>
                                <option>Em Manutenção</option>
                                <option>Sem Conserto</option>
                                <option>Funcionando</option>
                            </select>
                            <div class="invalid-feedback">
                                Selecione um Setor válido.
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="dataM" class="form-label">dataM</label>
                            <input class="form-control" type="datetime-local" id="dataM" name="dataM" value="<?php echo $row['dataM']; ?>" required>
                            <div class="invalid-feedback">
                                Descreva o Problema.
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="motivoM" class="form-label">motivoM</label>
                            <input class="form-control" type="text" id="motivoM" name="motivoM" value="<?php echo $row['motivoM']; ?>" required>
                            <div class="invalid-feedback">
                                Selecione um Setor válido.
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="tecnicoM" class="form-label">tecnicoM</label>
                            <select class="form-select" id="tecnicoM" name="tecnicoM" required>
                                <option value="<?php echo $row['tecnicoM']; ?>"> <?php echo $row['tecnicoM']; ?> </option>
                                <option>Alex Fushi</option>
                                <option>Ewerton Sousa</option>
                                <option>Geroncio da Silva</option>
                                <option>Lucas Lima</option>
                                <option>Samuel Santos</option>
                                <option>Willian de Sousa</option>
                            </select>
                            <div class="invalid-feedback">
                                Selecione um Setor válido.
                            </div>
                        </div>

                        <hr class="my-4">
                        <hr class="my-4">

                        <input class="w-100 btn btn-primary btn-lg" type="submit" value="Atualizar">
                        <a href="../../equip_manutencao.php" type="submit" class="btn btn-secondary">Cancelar!</a>
                    </div>
                </form>
            </div>


    <?php
        } else {
            echo "Chamado não encontrado.";
        }

        // Feche a conexão com o banco de dados

    } else {
        echo "ID do chamado não especificado.";
    }
    ?>
    <br><br><br><br>
    <!-- Links JS -->
    <script src="../../JS/dashboard.js"></script>
    <script src="../../JS/DIST/bootstrap.bundle.min.js"></script>
    <script src="../../JS/DIST/feather.min.js"></script>
    <script src="../../JS/DIST/chart.min.js"></script>
</body>

</html>