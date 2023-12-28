<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os valores do formulário
    $id = $_POST["id"];
    $id_item = $_POST["id_item"];
    $descricaoM = $_POST["descricaoM"];
    $nserieM = $_POST["nserieM"];
    $fornecedor = $_POST["fornecedor"];
    $statusM = $_POST["statusM"];
    $motivoM = $_POST["motivoM"];
    $dataM = $_POST["dataM"];
    $tecnicoM = $_POST["tecnicoM"];

    // Query SQL para atualizar os dados no banco de dados
    $sql = "UPDATE tb_manutencao SET id_item='$id_item', descricaoM='$descricaoM', nserieM='$nserieM', fornecedor='$fornecedor', statusM='$statusM', motivoM='$motivoM', dataM='$dataM', tecnicoM='$tecnicoM' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {

        $mysql = "UPDATE tb_estoque SET statusE='$statusM' WHERE nserieE='$nserieM'";

        if ($conn->query($mysql) === TRUE) {

            echo "<script>alert('Dados Alterados com sucesso.')</script>";
        } else {

            echo "<script>alert('Dados Não Alterados !')</script>";
        }
    } else {
        echo "<script>alert('Erro ao atualizar os dados: ')</script>" . $conn->error;
    }
}
