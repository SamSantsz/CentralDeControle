<?php
/// informações de conexão com o banco de dados
@include '../../CONEXAO/bancodados.php';

// Verifica se um arquivo foi enviado
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
    // Diretório onde a imagem será salva
    $diretorio = '../../IMG/EQUIPAMENTO/';

    // Nome do arquivo original
    $nomeOriginal = $_FILES['imagem']['name'];
    $nome = $_POST['nome'];

    // Caminho completo do arquivo no servidor
    $caminhoCompleto = $diretorio . $nomeOriginal;

    // Move a imagem para o diretório de uploads
    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoCompleto)) {
        // Redimensiona a imagem para o tamanho padrão
        list($largura, $altura) = getimagesize($caminhoCompleto);
        
        $larguraPadrao = 300; // Tamanho padrão desejado
        $alturaPadrao = 300;  // Tamanho padrão desejado

        $novaImagem = imagecreatetruecolor($larguraPadrao, $alturaPadrao);
        $imagemOriginal = imagecreatefromjpeg($caminhoCompleto); // Supondo que a imagem seja JPEG, ajuste se necessário

        imagecopyresampled($novaImagem, $imagemOriginal, 0, 0, 0, 0, $larguraPadrao, $alturaPadrao, $largura, $altura);

        // Salva a imagem redimensionada de volta no arquivo
        imagejpeg($novaImagem, $caminhoCompleto);
        

        // Insere o nome do arquivo na tabela tb_item
        $sql = "INSERT INTO tb_item (descricaoI, imagemI) VALUES ('$nome', '$nomeOriginal')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Equipamento Cadastrado com Sucesso.'); location.href='../../index.php';</script>";
            
        } else {
            echo "<script>alert('Erro ao inserir dados: '); location.href='../../index.php';</script>" . $conn;
        }

        // Libera memória
        imagedestroy($novaImagem);
        imagedestroy($imagemOriginal);
    } else {
        echo "<script>alert('Erro ao enviar arquivo.'); location.href='../../index.php';</script>";
    }
}

?>