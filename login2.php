<?php
 require('inc/banco.php');
 
 $usuario = $_POST['usuario'] ?? null;
 $senha = $_POST['senha'] ?? null;
 
 
 if($usuario && $senha){
     try{
         $query = $pdo->prepare('INSERT INTO usuarios (usuario, senha) VALUES (:usuario, :senha)');
 
         $query->execute([":usuario"=>$usuario, ":senha"=>password_hash($senha, PASSWORD_DEFAULT)]);
 
         session_start();
         $_SESSION['usuario']=$usuario;
         
         header('location: compras.php');
     }catch(Exception){
         header('location: login.php');
     }
 
 }