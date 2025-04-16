<?php

require('inc/banco.php');
require_once('session.php');

$titulo = $_POST['titulo'] ?? null;
$data = $_POST['data'] ?? null;

if ($titulo) {
  //prepara a consulta
  $query = $pdo->prepare('INSERT INTO compromissos (titulo,data) VALUES (:ti,:dt)');

  //associa os valores dentro da consulta
  $query->bindValue(':ti', $titulo);
  $query->bindValue(':dt', $data);

  //executa a consulta
  $query->execute();
}
header('location:compromissos.php');