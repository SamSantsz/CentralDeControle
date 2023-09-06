<?php
// informações de conexão com o banco de dados
@include '../conexao/bancodados.php';

// Verifica se foi enviado um arquivo
if (isset($_FILES['imagem'])) {
    // Pasta onde a imagem será salva
    $target_dir = "../img/";
    // Nome do arquivo
    $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
    // Verifica se o arquivo é uma imagem
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
        echo "Apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
        header('Location: ../index.php');
        exit();
    }
    // Move o arquivo para a pasta uploads
    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
        // Insere os dados no banco de dados
        $nome = $_POST['nome'];
        $imagem = $target_file;
        $sql = "INSERT INTO tb_item (nome, imagem) VALUES ('$nome', '$imagem')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Dados inseridos com sucesso.');</script>";
            header('Location: ../index.php');
            exit();
        } else {
            echo "<script>alert('Erro ao inserir dados: ');</script>" . $conn;
            header('Location: ../index.php');
        }
    } else {
        echo "<script>alert('Erro ao enviar arquivo.');</script>";
        header('Location: ../index.php');
    }
}
?>