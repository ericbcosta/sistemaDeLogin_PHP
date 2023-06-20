<?php
$serverName = "localhost";
$userName = "root";
$password = "root";
$dbName = "sistemaDeLogin";

$conn = new mysqli($serverName, $userName, $password, $dbName);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

function autenticarSenha($senha, $hashSenha)
{
    return password_verify($senha, $hashSenha);
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario WHERE email_usu = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hashSenha = $row['senha_usu'];

    if (autenticarSenha($senha, $hashSenha)) {

        header("Location: logoff_page.php");
        exit;
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Usuário não encontrado!";
}

$conn->close();
?>