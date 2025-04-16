<?php

require_once('twig_carregar.php');
require_once('session.php');

echo $twig->render('compras_form.html', [
    'id' => $_GET['id'],
    'item' => $_GET['item']
]);