<!-- Concexão com Banco de Dados -->
<?php
include '../CONEXAO/bancodados.php';

$id = $_GET['estoque'];
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
                <?php
                $select = mysqli_query($conn, "SELECT * FROM tb_item WHERE id = '$id'");
                ?>
                <br>
                <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                    <img class="img-thumbnail mb-3 d-block mx-auto mb-4s" alt="" width="150" height="150" loading="lazy" src="../img/<?php echo $row['imagem']; ?>" alt="">

                    <div class="bg-body-tertiary border rounded-3">
                        <h2 style="text-align: center;"><?php echo $row['descricao']; ?></h2>
                    </div>
                    <!-- Fim Painel de Item -->
                <?php } ?>
            </div>
            <!-- Fim da Imagem da Logo -->

            <br><br>
            <div class="row g-5">
                <!-- Campo do Formulario -->
                <div class="col-md-8 col-lg-7" style="margin: auto">
                    <h3 class="mb-3">Novo Equipamento</h3>
                    <form method="POST" action="cadfrom.php" class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="nome" class="form-label">N° Série</label>
                                <input type="number" class="form-control" id="Nome" name="nome" required>
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
                                <label for="teamViewer" class="form-label">PDV <span class="text-body-secondary">(Optional)</span></label>
                                <input type="number" class="form-control" id="teamViewer" name="teamviewer" placeholder="Caixa...">
                            </div>

                            <div class="col-md-4">

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

                        <button class="w-100 btn btn-primary btn-lg" value="Salvar" type="submit">Cadastrar Equipamento</button>
                    </form>
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