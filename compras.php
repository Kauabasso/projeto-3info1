<?php

require_once('twig_carregar.php');
require('inc/banco.php');
require_once('session.php');

if (!isset($_SESSION['usuario'])) {
    header("location: login3.php");
    exit;
}
//Busca as compras no Banco
$dados = $pdo->query('SELECT * FROM compras');

$comp = $dados->fetchAll(PDO::FETCH_ASSOC);


echo $twig->render('compras.html', [
    'titulo' => 'Compras',
    'compras' => $comp, //no html ela vai se chamar compras, aqui ela se chama comp
    'usuario' => $_SESSION['usuario']
]);

