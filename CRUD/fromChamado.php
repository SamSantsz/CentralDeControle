<!-- Concexão com Banco de Dados -->
<?php
include '../conexao/bancodados.php';

include 'cadastro.php';


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM tb_item WHERE id = $id");
    echo "<script>alert('Registro excluído com sucesso.');</script>";
    header('location:index.php');
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
                    <form class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="Nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="Nome" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Nome válido é obrigatório.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="E-mail" class="form-label">E-mail</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="email" class="form-control" id="E-mail" placeholder="you@example.com" required>
                                    <div class="invalid-feedback">
                                        E-mail válido é obrigatório.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="Whatsapp" class="form-label">N° Whatsapp <span class="text-body-secondary">(Optional)</span></label>
                                <input type="Whatsapp" class="form-control" id="Whatsapp" placeholder="(85)9 0000-0000">
                                <div class="invalid-feedback">
                                    N° Whatsapp válido
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="Loja" class="form-label">Loja</label>
                                <select class="form-select" id="Loja" required>
                                    <option value="">Moranguinho...</option>
                                    <option>Matriz</option>
                                    <option>Filial</option>
                                    <option>Conceito</option>
                                </select>
                                <div class="invalid-feedback">
                                    Selecione uma Loja válida.
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="Setor" class="form-label">Setor</label>
                                <select class="form-select" id="Setor" required>
                                    <option value="">Setor...</option>
                                    <option>F.Loja</option>
                                    <option>Salão</option>
                                    <option>Recebimento</option>
                                </select>
                                <div class="invalid-feedback">
                                    Selecione um Setor válido.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="Problema" class="form-label">Problema</label>
                                <textarea type="text" class="form-control" id="Problema" rows="3"></textarea required>
                                <div class="invalid-feedback">
                                    Descreva o Problema.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="TeamViewer" class="form-label">TeamViewer <span class="text-body-secondary">(Optional)</span></label>
                                <input type="number" class="form-control" id="TeamViewer" placeholder="ID">
                            </div>

                            <div class="col-md-5">
                                <label for="Data" class="form-label">Data de Criação</label>
                                <input type="datetime-local" class="form-control" id="data" >
                                <div type="text" class="form-control">
                                    <script src="../js/style.js"></script>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="Tecnico" class="form-label">Tecnico</label>
                                <input type="text" class="form-control" id="Status" placeholder="Tecnico..." required readonly>
                                <div class="invalid-feedback">
                                    Tecnico responsavel.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="Status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="Status" placeholder="Não Iniciado" required readonly>
                                <div class="invalid-feedback">
                                    Status do Chamado
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">
                        <hr class="my-4">
                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Envia Chamando</button>
                    </form>
                </div>
                <!-- Fim Campo do Formulario -->
            </div>
        </main>

        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
            <p class="mb-1">&copy; 2017–2023 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>

    <!-- Links JS -->
    <script src="../js/dashboard.js"></script>
    <script src="../js/dist/bootstrap.bundle.min.js"></script>
    <script src="../js/dist/feather.min.js"></script>
    <script src="../js/dist/chart.min.js"></script>

</body>

</html>