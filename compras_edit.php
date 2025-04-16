<?php

require('inc/banco.php');
require_once('session.php');

$id = $_POST['id'] ?? null;
$item = $_POST['novo_nome_item'] ?? null;

if ($item) {
  $query = $pdo->prepare('UPDATE compras SET item = :it WHERE id = :id');
  $query->bindValue(':id', $id);
  $query->bindValue(':it', $item);
  $query->execute();
}

header('location:compras.php');
