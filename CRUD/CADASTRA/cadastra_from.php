<?php
// informações de conexão com o banco de dados
@include '../../conexao/bancodados.php';

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os valores do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $whatsapp = $_POST["whatsapp"];
    $loja = $_POST["loja"];
    $setor = $_POST["setor"];
    $problema = $_POST["problema"];
    $teamviewer = $_POST["teamviewer"];
    $data = $_POST["data"];
    $status = $_POST["status"] = 'Triagem';

    // Query SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO tb_chamado (nome, email, whatsapp, loja, setor, problema, teamviewer, data, status)
            VALUES ('$nome', '$email', '$whatsapp', '$loja', '$setor', '$problema', '$teamviewer', '$data', '$status')";

    if ($conn->query($sql) === TRUE) {

        echo "<script> alert('Cadastro realizado com sucesso!'); location.href='../../painel_chamado.php'; </script>";
        
    } else {

        echo "<script> alert('Por favor, preencha todos os campos!'); location.href='../../painel_chamado.php'; </script>";
       
    }

    // Feche a conexão com o banco de dados
}
