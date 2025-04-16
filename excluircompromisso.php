<?php

require('inc/banco.php');

$id = $_GET['id'] ?? null;

if($id){
    //prepara a consulta

  $query = $pdo->prepare('DELETE FROM compromissos WHERE id = :id');
  
  //associa os valores dentro da consulta
  $query->bindValue(':id', $id);

  //executa a consulta
  $query->execute();

  //ou $query->execute([':id', $id])
}
header('location:compromissos.php');