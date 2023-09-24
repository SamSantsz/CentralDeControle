<?php
// Concexão com Banco de Dados
include '../conexao/bancodados.php';

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
                <img class="d-block mx-auto mb-4" src="../img/logo.jpeg" alt="" width="100" height="100">
                <h2>Formulário de Chamado da T.I</h2>
            </div>
            <!-- Fim da Imagem da Logo -->
            <br><br>
            <div class="row g-5">
                <!-- Campo do Formulario -->
                <div class="col-md-8 col-lg-7" style="margin: auto">
                    <h3 class="mb-3">Novo Chamado</h3>
                    <form method="POST" action="CADASTRA/cadastra_from.php" class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="Nome" name="nome" required>
                                <div class="invalid-feedback">
                                    Nome válido é obrigatório.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">E-mail</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                                    <div class="invalid-feedback">
                                        E-mail válido é obrigatório.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="whatsapp" class="form-label">N° Whatsapp <span class="text-body-secondary">(Optional)</span></label>
                                <input type="number" class="form-control" id="whatsapp" name="whatsapp" placeholder="9 0000-0000">
                                <div class="invalid-feedback">
                                    N° Whatsapp válido
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
                                <label for="problema" class="form-label">Problema</label>
                                <textarea type="text" class="form-control" id="problema" name="problema" rows="3" required></textarea>
                                <div class="invalid-feedback">
                                    Descreva o Problema.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="teamViewer" class="form-label">TeamViewer <span class="text-body-secondary">(Optional)</span></label>
                                <input type="number" class="form-control" id="teamViewer" name="teamviewer" placeholder="ID">
                            </div>

                            <div class="col-md-4">
                                <label for="data" class="form-label">Data de Criação</label>
                                <input type="datetime-local" class="form-control" id="data" name="data" required>
                                <!-- <div type="text" class="form-control">
                                    <script src="../js/style.js"></script>
                                </div> -->
                            </div>

                            <div class="col-md-4">

                            </div>

                            <div class="col-md-4">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" name="status" placeholder="Não Iniciado" required readonly>
                                <div class="invalid-feedback">
                                    Status do Chamado
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">
                        <hr class="my-4">
                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" value="Salvar" type="submit">Envia Chamando</button>
                    </form>
                </div>
                <!-- Fim Campo do Formulario -->
            </div>
        </main>
    </div>
    <br><br><br><br>
    <!-- Links JS -->
    <script src="../js/dashboard.js"></script>
    <script src="../js/dist/bootstrap.bundle.min.js"></script>
    <script src="../js/dist/feather.min.js"></script>
    <script src="../js/dist/chart.min.js"></script>

</body>

</html>