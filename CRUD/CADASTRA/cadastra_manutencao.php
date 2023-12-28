<?php
// informações de conexão com o banco de dados
@include '../../CONEXAO/bancodados.php';
$id = $_GET['detalhe'];

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os valores do formulário
    $id_item = $_POST["iditem"];
    $descricaoM = $_POST["descricaoM"];
    $nserieM = $_POST["nserieM"];
    $fornecedor = $_POST["fornecedor"];
    $statusM = $_POST["statusM"];
    $dataM = $_POST["dataM"];
    $motivoM = $_POST["motivoM"];
    $tecnicoM = $_POST["tecnicoM"];

    // Query SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO tb_manutencao (id_item, descricaoM, nserieM, fornecedor, statusM, dataM, motivoM, tecnicoM)
            VALUES ('$id_item', '$descricaoM', '$nserieM', '$fornecedor', '$statusM', '$dataM', '$motivoM', '$tecnicoM')";

    if ($conn->query($sql) === TRUE) {

        $mysql = "UPDATE tb_estoque SET statusE='$statusM' WHERE nserieE='$nserieM'";

        if ($conn->query($mysql) === TRUE) {

            echo "<script> alert('Laudo realizado com sucesso!'); location.href='../../equip_manutencao.php?detalhe=$id'; </script>";
        } else {

            echo "<script> alert('Dados não alterado!'); location.href='../../index.php?detalhe=$id'; </script>";
        }
    } else {

        echo "<script> alert('Por favor, preencha todos os campos!'); location.href='altera_mcitem.php?detalhe=$id'; </script>";
    }

    // Feche a conexão com o banco de dados
}
