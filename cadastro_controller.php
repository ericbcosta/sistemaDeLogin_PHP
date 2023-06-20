<?php
$serverName = "localhost";
$userName = "root";
$password = "root";
$dbName = "sistemaDeLogin";

$conn = new mysqli($serverName, $userName, $password, $dbName);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

function criarHash($senha)
{
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    return $hash;
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$hashSenha = criarHash($senha);

$sql = "INSERT INTO usuario (nome_usu, email_usu, senha_usu) VALUES ('$nome', '$email', '$hashSenha')";

if ($conn->query($sql) === TRUE) {
    header("Location: login_page.php");
    exit;
} else {
    echo "Erro ao cadastrar usuário: " . $conn->error;
}

$conn->close();
?>