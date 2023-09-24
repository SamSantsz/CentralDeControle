    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupere os valores do formulário
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $whatsapp = $_POST["whatsapp"];
        $loja = $_POST["loja"];
        $setor = $_POST["setor"];
        $problema = $_POST["problema"];
        $teamviewer = $_POST["teamviewer"];
        $data = $_POST["data"];
        $status = $_POST["status"];
        $tecnico = $_POST["tecnico"];
        $resolucao = $_POST["resolucao"];
        $dataFin = $_POST["dataFin"];

        // Query SQL para atualizar os dados no banco de dados
        $sql = "UPDATE tb_chamado SET nome='$nome', email='$email', whatsapp='$whatsapp', loja='$loja', setor='$setor', problema='$problema', teamviewer='$teamviewer', data='$data', status='$status', tecnico='$tecnico', resolucao='$resolucao', dataFin='$dataFin' WHERE  id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Dados Alterados com sucesso.')</script>";
        } else {
            echo "<script>alert('Erro ao atualizar os dados: ')</script>" . $conn->error;
        }
    }
    ?>
