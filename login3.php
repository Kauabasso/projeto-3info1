<?php
 require_once('twig_carregar.php');
 require('inc/banco.php');
 
 $usuario = $_POST['usuario'] ?? null;
 $senha = $_POST['senha'] ?? null;
 
 if($usuario && $senha){
     $query = $pdo->prepare('SELECT * FROM usuarios WHERE usuario=:usuario');
     $query->execute([":usuario"=>$usuario]);
     $usuario = $query->fetchAll(PDO::FETCH_ASSOC);

     if (isset($usuario[0]) && password_verify($senha, $usuario[0]['senha'])) {
         session_start();
         $_SESSION['usuario']=$usuario;
         header("location: compras.php");
     } else {
        echo $twig->render('login.html', [
            'titulo' => 'Login'
        ]);
    }
 
 } else {
     echo $twig->render('login.html', [
         'titulo' => 'Login'
     ]);
   
 }
