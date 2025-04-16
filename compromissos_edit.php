<?php

require('inc/banco.php');
require_once('session.php');

$id = $_POST['id'] ?? null;
$titulo = $_POST['novo_nome_titulo'] ?? null;
$data = $_POST['novo_nome_data'] ?? null;


if ($titulo) {
  $query = $pdo->prepare('UPDATE compromissos SET titulo = :ti, data = :dt WHERE id = :id');
 
  $query->bindValue(':id', $id);
  $query->bindValue(':ti', $titulo);
  $query->bindValue(':dt', $data);
  $query->execute();
}

header('location:compromissos.php');