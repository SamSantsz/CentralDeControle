<?php
// informações de conexão com o banco de dados
@include '../conexao/bancodados.php';

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os valores do formulário
    $descricao = $_POST["descricao"];
    $nserie = $_POST["nserie"];
    $loja = $_POST["loja"];
    $setor = $_POST["setor"];
    $pdv = $_POST["pdv"];
    $situacao = $_POST["situacao"] = 'Funcionando';

    // Query SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO tb_estoque (descricao, nserie, loja, setor, pdv, situacao)
            VALUES ('$descricao', '$nserie', '$loja', '$setor', '$pdv', '$situacao')";

    if ($conn->query($sql) === TRUE) {
        $select = mysqli_query($conn, "SELECT * FROM tb_item");
        while ($row = mysqli_fetch_assoc($select)) {
            
            echo "<script> alert('Cadastro realizado com sucesso!'); windows.location.href='../detalhe_item'; </script>";

            header('Location: ../detalhe_item.php?detalhe=echo $row["id"];"');
        }
    } else {
        echo "<script> alert('Por favor, preencha todos os campos!'); windows.location.href='../detalhe_item'; </script>";
        header('Location: ../detalhe_item.php?detalhe=<?php echo $row["id"]; ?>"');
    }

    // Feche a conexão com o banco de dados
}
