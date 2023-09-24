<?php

include '../../conexao/bancodados.php';

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">

    <title>Controle de Chamados</title>

    <!-- Links CSS -->
    <link href="../../css/dist/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/styles.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">
    <!-- Imagem de Logo -->
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../../img/logo.jpeg" alt="" width="100" height="100">
        <h2>Formulário de Chamado da T.I</h2>
    </div>
    <!-- Fim da Imagem da Logo -->
    <br><br>

    <?php
    // Verifique se o ID do chamado foi passado como parâmetro
    if (isset($_GET["id"])) {
        $chamado_id = $_GET["id"];

        // Consulta SQL para recuperar os dados do chamado com base no ID
        $sql = "SELECT * FROM tb_chamado WHERE id = $chamado_id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Exiba um formulário de edição preenchido com os dados atuais do chamado
    ?>

            <div class="col-md-8 col-lg-7" style="margin: auto">
                <h3 class="mb-3">Editar Chamado</h3>
                <form action="../../painel_chamado.php" method="POST">
                    <div class="row g-3">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        <div class="col-sm-12">
                            <label for="nome" class="form-label">Nome</label>
                            <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required readonly>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">E-mail</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">@</span>
                                <input class="form-control" type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required readonly>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="whatsapp" class="form-label">N° Whatsapp <span class="text-body-secondary">(Optional)</span></label>
                            <input class="form-control" type="number" id="whatsapp" name="whatsapp" value="<?php echo $row['whatsapp']; ?>" required readonly>
                            <div class="invalid-feedback">
                                N° Whatsapp válido
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="loja" class="form-label">Loja</label>
                            <input class="form-select" type="text" id="loja" name="loja" value="<?php echo $row['loja']; ?>" required readonly>
                            <div class="invalid-feedback">
                                Selecione uma Loja válida.
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="setor" class="form-label">Setor</label>
                            <input class="form-select" type="text" id="setor" name="setor" value="<?php echo $row['setor']; ?>" required readonly>
                            <div class="invalid-feedback">
                                Selecione um Setor válido.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="problema" class="form-label">Problema</label>
                            <input class="form-control" type="text" id="problema" name="problema" value="<?php echo $row['problema']; ?>" required readonly>
                            <div class="invalid-feedback">
                                Descreva o Problema.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="teamViewer" class="form-label">TeamViewer <span class="text-body-secondary">(Optional)</span></label>
                            <input class="form-control" type="number" id="teamviewer" name="teamviewer" value="<?php echo $row['teamviewer']; ?>" required readonly>
                        </div>

                        <div class="col-md-4">
                            <label for="data" class="form-label">Data de Criação</label>
                            <input class="form-control" type="text" id="data" name="data" value="<?php echo $row['data']; ?>" required readonly>
                        </div>

                        <div class="col-md-4">

                        </div>

                        <div class="col-md-4">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="<?php echo $row['status']; ?>"> <?php echo $row['status']; ?> </option>
                                <option>Não Impor/Não Urgen</option>
                                <option>Não Impor/Urgente</option>
                                <option>Importante/Não Urgen</option>
                                <option>Importante/Urgente</option>
                                <option>Finalizado</option>
                            </select>
                            <div class="invalid-feedback">
                                Selecione um Setor válido.
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="col-12">
                            <label for="resolucao" class="form-label">Resolução do Problema</label>
                            <input class="form-control" type="text" id="resolucao" name="resolucao" rows="3" value="<?php echo $row['resolucao']; ?>">
                        </div>

                        <div class="col-md-4">
                            <label for="dataFin" class="form-label">Data de Finalização</label>
                            <input class="form-control" type="datetime-local" id="dataFin" name="dataFin" value="<?php echo $row['dataFin']; ?>" required>
                        </div>

                        <div class="col-md-4">

                        </div>

                        <div class="col-md-4">
                            <label for="tecnico" class="form-label">Tecnico</label>
                            <select class="form-select" id="tecnico" name="tecnico" required>
                                <option value="<?php echo $row['tecnico']; ?>"><?php echo $row['tecnico']; ?>...</option>
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
    <script src="../../js/dashboard.js"></script>
    <script src="../../js/dist/bootstrap.bundle.min.js"></script>
    <script src="../../js/dist/feather.min.js"></script>
    <script src="../../js/dist/chart.min.js"></script>
</body>

</html>