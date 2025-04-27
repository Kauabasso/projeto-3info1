<?php
require_once('twig_carregar.php');
require('inc/banco.php');
require_once('session.php');
require_once('vendor/autoload.php'); 
use Carbon\Carbon;

$dados = $pdo->query('SELECT * FROM compromissos ORDER BY data ASC');

$comp = $dados->fetchAll(PDO::FETCH_ASSOC);

foreach ($comp as &$compromisso) {
    $data = Carbon::parse($compromisso['data']);
    $compromisso['fim_de_semana'] = $data->isWeekend() ? 'Sim' : 'Não';
 
}

echo $twig->render('compromissos.html', [
    'titulo' => 'Compromissos',
    'compromissos' => $comp,
]);
