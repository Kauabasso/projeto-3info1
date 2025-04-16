<?php

require_once('twig_carregar.php');
require('inc/banco.php');
require_once('session.php');

//Busca as compras no Banco
$dados = $pdo->query('SELECT * FROM compromissos');

$comp = $dados->fetchAll(PDO::FETCH_ASSOC);


echo $twig->render('compromissos.html', [
    'titulo' => 'Compromissos',
    'compromissos' => $comp, //no html ela vai se chamar compras, aqui ela se chama comp
]);