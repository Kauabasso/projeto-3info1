<?php

//acesso ao carbon e ao twig
require('twig_carregar.php');

use Carbon\Carbon;

//Montar um página no twig chamada "Horário"
//Será possível acessar pelo menu
//Deverá mostrar a data de hoje e a data de amanhã

date_default_timezone_set('America/Sao_Paulo');

//Agora
echo 'Dia de hoje:'. Carbon::now(). '<br>';

//Adiona um dia
echo 'Amanhâ:'. Carbon::now()->addDay() . '<br>';