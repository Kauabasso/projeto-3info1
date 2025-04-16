<?php

//Não se deve salvar senhas diretamente no arquivo (da maneira como estamos fazendo aqui)

$pdo = new PDO('mysql:host=localhost;dbname=3info', 'root', ''); //<--como conectar no banco de dados