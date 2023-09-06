<?php

include '../conexao/bancodados.php';

$id = $_GET['edit'];

if (isset($_POST['update_tb_item'])) {

   $tb_item_name = $_POST['tb_item_nome'];
   $tb_item_imagem = $_FILES['tb_item_imagem']['name'];
   $tb_itemt_imagem_tmp_name = $_FILES['tb_item_imagem']['tmp_name'];
   $tb_item_imagem_folder = 'img/' . $tb_item_imagem;

   if (empty($tb_item_name) || empty($tb_item_imagem)) {
      $message[] = 'por favor preencha todos';
   } else {

      $update_data = "UPDATE tb_item SET nome='$tb_item_name', imagem='$tb_item_imagem'  WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if ($upload) {
         move_uploaded_file($tb_itemt_imagem_tmp_name, $tb_item_imagem_folder);
         echo "<script>alert('Dados Alterados com sucesso.');</script>";
         header('location:../index.php');
      } else {
         $$message[] = 'por favor preencha todos';
      }
   }
};
?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.108.0">

  <title>Dashboard Template</title>

  <link href="../css/dist/bootstrap.min.css" rel="stylesheet">
  <link href="../css/styles.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/dashboard.css" rel="stylesheet">
</head>

<body>
   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '<span class="message">' . $message . '</span>';
      }
   }
   ?>
   <div class="container">
      <div class="admin-product-form-container centered">
         <?php
         $select = mysqli_query($conn, "SELECT * FROM tb_item WHERE id = '$id'");
         while ($row = mysqli_fetch_assoc($select)) {
         ?>
            <form action="" method="post" enctype="multipart/form-data">
               <h3 class="title">Altera Item</h3>
               <input type="text" class="box" name="tb_item_nome" value="<?php echo $row['nome']; ?>" placeholder="enter the product name">
               <br><br>
               <input type="file" class="box" name="tb_item_imagem" accept="imagem/png, imagem/jpeg, imagem/jpg">
               <br><br>
               <input type="submit" value="Altera Item" name="update_tb_item" class="btn btn-primary">
               <a href="../index.php" class="btn btn-secondary">Cancelar!</a>
            </form>
         <?php }; ?>
      </div>
   </div>
</body>
</html>