<?php
// informações de conexão com o banco de dados
@include '../../CONEXAO/bancodados.php';

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os valores do formulário
    $ipR = $_POST["ipR"];
    $nserieR = $_POST["nserieR"];
    $nmacR = $_POST["nmacR"];
    $lojaR = $_POST["lojaR"];
    $patrimonioR = $_POST["patrimonioR"];
    $ramalR = $_POST["ramalR"];
    $ncaixaR = $_POST["ncaixaR"];
    $numeroR = $_POST["numeroR"];
    $equipR = $_POST["equipR"];
    $localR = $_POST["localR"];
    $modeloR = $_POST["modeloR"];

    // Query SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO tb_relatorio (ipR, nserieR, nmacR, lojaR, patrimonioR, ramalR, ncaixaR, numeroR, equipR, localR, modeloR)
             VALUES ('$ipR', '$nserieR', '$nmacR', '$lojaR', '$patrimonioR', '$ramalR', '$ncaixaR', '$numeroR','$equipR', '$localR', '$modeloR')";

    if (mysqli_query($conn, $sql)) {
        echo "<script> alert('Cadastro realizado com sucesso!'); location.href='../../ips.php'; </script>";
    } else {
        echo "<script> alert('Por favor, preencha todos os campos!'); location.href='../../ips.php'; </script>";
    }

    // Feche a conexão com o banco de dados
}
