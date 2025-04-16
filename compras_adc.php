<?php

require('inc/banco.php');
require_once('session.php');

$item = $_POST['item'] ?? null;

if ($item) {
  //prepara a consulta
  $query = $pdo->prepare('INSERT INTO compras (item) VALUES (:it)');

  //associa os valores dentro da consulta
  $query->bindValue(':it', $item);

  //executa a consulta
  $query->execute();
}
header('location:compras.php');
