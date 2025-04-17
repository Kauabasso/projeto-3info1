<?php

// Carrega o carregador do Twig
require_once('twig_carregar.php');
require_once('session.php');

if (!isset($_SESSION['usuario'])) {
    header("location: login3.php");
    exit;
}
//Mostra o template na tela
echo $twig->render('index.html', [
    'fruta' => 'Abacaxi',
    'usuario' => $_SESSION['usuario']
]);