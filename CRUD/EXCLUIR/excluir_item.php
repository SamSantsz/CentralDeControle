<?php

  include '../../CONEXAO/bancodados.php';
  
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM tb_item WHERE id = $id");

  echo "<script>alert('Registro excluído com sucesso.'); location.href='../../index.php';</script>";
}
