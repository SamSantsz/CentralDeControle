<?php

include '../../conexao/bancodados.php';

$id = $_GET['edit'];

if (isset($_POST['update_tb_item'])) {

   $tb_item_name = $_POST['tb_item_nome'];
   $tb_item_imagem = $_FILES['tb_item_imagem']['name'];
   $tb_itemt_imagem_tmp_name = $_FILES['tb_item_imagem']['tmp_name'];
   $tb_item_imagem_folder = '../../img/' . $tb_item_imagem;

   if (empty($tb_item_name) || empty($tb_item_imagem)) {
      $message[] = 'por favor preencha todos';
   } else {

      $update_data = "UPDATE tb_item SET descricao	='$tb_item_name', imagem='$tb_item_imagem'  WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if ($upload) {
         move_uploaded_file($tb_itemt_imagem_tmp_name, $tb_item_imagem_folder);
         echo "<script>alert('Dados Alterados com sucesso.'); location.href='../../index.php';</script>";
      } else {
         $$message[] = 'por favor preencha todos';
      }
   }
};
?>

<!-- Fim Concexão com Banco de Dados -->

<!doctype html>
<html lang="pt">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
   <meta name="generator" content="Hugo 0.108.0">

   <title>Controle de Chamados</title>
   <!-- Favicons -->
  <link rel="icon" href="IMG/ICONE/icone.jpg" sizes="16x16" type="image/jpg">

   <!-- Links CSS -->
   <link href="../../css/dist/bootstrap.min.css" rel="stylesheet">
   <link href="../../css/styles.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="../../css/dashboard.css" rel="stylesheet">



</head>

<body>
   <!-- link do Menu -->
   <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <?php include '../../CONEXAO/NAV/menu.php' ?>
   </header>
   <!-- Fim link do Menu -->

   <div class="container-fluid">
      <div class="row">
         <!-- link do Barra Lateral -->
         <?php include '../../CONEXAO/NAV/barralateral.php' ?>
         <!-- Fim link do Barra Lateral -->
         <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="pt-2 mb-3 border-bottom">
               <h1 class="h2">Altera Item</h1>
            </div>
            <!-- Corpo -->
            <?php
            $select = mysqli_query($conn, "SELECT * FROM tb_item WHERE id = '$id'");
            ?>
            <?php while ($row = mysqli_fetch_assoc($select)) { ?>
               <div class=" d-block position-static shadow d-grid gap-4 col-3 col-md-3" style=" float: left;">
                  <div class="dropdown-menu d-block position-static pt-0 mx-0 rounded-3 shadow overflow-hidden w-280px">
                     <img class="img-thumbnail mb-3" alt="" width="480px" height="300" loading="lazy" src="../../img/<?php echo $row['imagem']; ?>" alt="">
                  </div>
               </div>
            <?php } ?>

            <?php
            if (isset($message)) {
               foreach ($message as $message) {
                  echo '<span class="message">' . $message . '</span>';
               }
            }
            ?>
            <div class="container col-md-8 col-lg-6">
               <div class="admin-product-form-container centered">
                  <?php
                  $select = mysqli_query($conn, "SELECT * FROM tb_item WHERE id = '$id'");
                  while ($row = mysqli_fetch_assoc($select)) {
                  ?>
                     <form action="" method="post" enctype="multipart/form-data">
                        <h5><label for="nome">Descrição:</label><br></h5>
                        <input type="text" class="form-control" name="tb_item_nome" value="<?php echo $row['descricao']; ?>" placeholder="enter the product name">
                        <br><br><br>
                        <h5><label for="imagem">Imagem:</label><br></h5>
                        <input type="file" class="form-control" name="tb_item_imagem" accept="imagem/png, imagem/jpeg, imagem/jpg">
                        <br><br>
                        <div class="modal-footer">
                           <a href="../index.php" type="submit" class="btn btn-secondary">Cancelar!</a>
                           <input type="submit" value="Altera Item" name="update_tb_item" class="btn btn-primary">
                        </div>
                     </form>
                  <?php }; ?>
               </div>
            </div>
            <!-- Fim Corpo -->
         </main>
      </div>
   </div>
   <!-- Links JS -->
   <script src="../../js/dashboard.js"></script>
   <script src="../../js/dist/bootstrap.bundle.min.js"></script>
   <script src="../../js/dist/feather.min.js"></script>
   <script src="../../js/dist/chart.min.js"></script>

</body>

</html>