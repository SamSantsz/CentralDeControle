<!-- Conta triagem -->

<?php
// Consulta SQL para contar os chamados com status "Triagem"
$sql = "SELECT COUNT(*) as Matriz FROM tb_relatorio WHERE status = 'Matriz'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $Matriz = $row["Matriz"];
} else {
    echo "Nenhum chamado finalizado encontrado.";
}
?>

<!-- Conta Não Importante/Não Urgente -->

<?php
// Consulta SQL para contar os chamados com status "Não Impor/Não Urgen"
$sql = "SELECT COUNT(*) as n_imp_n_urg FROM tb_chamado WHERE status = 'Não Impor/Não Urgen'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $n_imp_n_urg = $row["n_imp_n_urg"];
} else {
    echo "Nenhum chamado Não Importante/Não Urgente encontrado.";
}
?>

<!-- Conta Não Importante/ Urgente -->

<?php
// Consulta SQL para contar os chamados com status "Não Importante/ Urgente"
$sql = "SELECT COUNT(*) as n_imp_urg FROM tb_chamado WHERE status = 'Não Impor/Urgente'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $n_imp_urg = $row["n_imp_urg"];
} else {
    echo "Nenhum chamado finalizado encontrado.";
}
?>

<!-- Conta Importante/Não Urgente -->

<?php
// Consulta SQL para contar os chamados com status "Finalizado"
$sql = "SELECT COUNT(*) as imp_n_urg FROM tb_chamado WHERE status = 'Importante/Não Urgen'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $imp_n_urg = $row["imp_n_urg"];
} else {
    echo "Nenhum chamado finalizado encontrado.";
}
?>

<!-- Conta Importante/Urgente -->

<?php
// Consulta SQL para contar os chamados com status "Importante/Urgente"
$sql = "SELECT COUNT(*) as imp_urg FROM tb_chamado WHERE status = 'Importante/Urgente'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $imp_urg = $row["imp_urg"];
} else {
    echo "Nenhum chamado finalizado encontrado.";
}
?>

<!-- Conta Finalizado -->

<?php
// Consulta SQL para contar os chamados com status "Finalizado"
$sql = "SELECT COUNT(*) as finalizados FROM tb_chamado WHERE status = 'Finalizado'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $finalizados = $row["finalizados"];
} else {
    echo "Nenhum chamado finalizado encontrado.";
}
?>