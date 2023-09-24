<?php
// informações de conexão com o banco de dados
@include '../../conexao/bancodados.php';
$id = $_GET['detalhe'];

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os valores do formulário
    $id_item = $_POST["iditem"];
    $descricao = $_POST["descricao"];
    $nserie = $_POST["nserie"];
    $loja = $_POST["loja"];
    $setor = $_POST["setor"];
    $pdv = $_POST["pdv"];
    $situacao = $_POST["situacao"] = 'Funcionando';

    // Query SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO tb_estoque (id_item, descricao, nserie, loja, setor, pdv, situacao)
            VALUES ('$id_item', '$descricao', '$nserie', '$loja', '$setor', '$pdv', '$situacao')";

    if ($conn->query($sql) === TRUE) {
        $select = mysqli_query($conn, "SELECT * FROM tb_item WHERE $id");
        while ($row = mysqli_fetch_assoc($select)) {
            echo "<script> alert('Cadastro realizado com sucesso!'); location.href='../../detalhe_item.php?detalhe=$id'; </script>";
        }
    } else {
        echo "<script> alert('Por favor, preencha todos os campos!'); location.href='../../detalhe_item.php?detalhe=$id'; </script>";
    }

    // Feche a conexão com o banco de dados
}
