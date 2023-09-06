<?php
// informações de conexão
$hostname = 'localhost'; // endereço do servidor do banco de dados
$username = 'root'; // nome de usuário do banco de dados
$password = ''; // senha do banco de dados
$database = 'bd_estoque'; // nome do banco de dados

// conexão com o banco de dados
$conn = new mysqli($hostname, $username, $password, $database);

// verifica se ocorreu algum erro na conexão
if ($conn->connect_error) {
    die('Falha na conexão: ' . $conn->connect_error);
}
?>