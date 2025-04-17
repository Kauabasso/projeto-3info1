<?php
require_once('twig_carregar.php');
require('inc/banco.php');
require_once('session.php');

if (!isset($_SESSION['usuario'])) {
    header("location: login3.php");
    exit;
}

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senha_atual = $_POST['senha_atual'] ?? '';
    $nova_senha = $_POST['nova_senha'] ?? '';
    $confirmar_senha = $_POST['confirmar_senha'] ?? '';

  
    $usuario_nome = $_SESSION['usuario'];

    $query = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $query->execute([':usuario' => $usuario_nome]);
    $usuario = $query->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha_atual, $usuario['senha'])) {
        if ($nova_senha === $confirmar_senha) {
            $nova_senha_certa = password_hash($nova_senha, PASSWORD_DEFAULT);
            $update = $pdo->prepare("UPDATE usuarios SET senha = :senha WHERE usuario = :usuario");
            $update->execute([
                ':senha' => $nova_senha_certa,
                ':usuario' => $usuario_nome
            ]);
            $mensagem = 'Senha alterada com sucesso!';
        } else {
            $mensagem = 'As novas senhas estão incorretas.';
        }
    } else {
        $mensagem = 'Senha atual está incorreta.';
    }
}

echo $twig->render('alterar_senha.html', [
    'titulo' => 'Alterar Senha',
    'usuario' => $_SESSION['usuario'],
    'mensagem' => $mensagem
]);