<?php
function criarHash($senha)
{
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    return $hash;
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$hashSenha = criarHash($senha);

echo "<h3>Cadastrado com Sucesso:</h3>";
echo "Nome: " . $nome ;
echo "Email: " . $email;
echo "Senha: " . $hashSenha;
?>