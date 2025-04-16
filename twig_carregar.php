<?php

//carrega o carregador do Composer
require_once('vendor/autoload.php');

//Loader é quem carrega os arquivos html
$loader = new \Twig\Loader\FilesystemLoader('./templates');

// Criar o objto do twig
$twig = new \Twig\Environment($loader);