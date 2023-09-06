<?php
// informações de conexão com o banco de dados
@include '../conexao/bancodados.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome = $_POST["Nome"];
    $email = $_POST["Email"];
    $whatsapp = $_POST["Whatsapp"];
    $loja = $_POST["Loja"];
    $setor = $_POST["Setor"];
    $problema = $_POST["Problema"];
    $teamiewer = $_POST["TeamViewer"];
    $data = $_POST["Data"];
    $status = $_POST["Status"];

    // Insere os dados na tabela do banco de dados
    $sql = "INSERT INTO tb_chamado(nome, email, whatsapp, loja, setor, problema, teamviewer, data, status) 
            VALUES ('$nome','$email','$whatsapp','$loja','$setor','$problema','$teamiewer','$data','$status')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Dados inseridos com sucesso.');</script>";
            header('Location: fromChamado.php');
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }

    $conn->close();
}
