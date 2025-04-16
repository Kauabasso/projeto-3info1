# Projeto OHOLERO-Twig 2050

Projeto para **aprendizado** em *Programação Web III*

## enquanto isso, admire este lindo poema:

use Carbon\Carbon;

$data = '2025-04-05'; // Exemplo de data
$carbonDate = Carbon::parse($data);

if ($carbonDate->isWeekend()) {
    echo "Este compromisso cai em um final de semana.";
} else {
    echo "Este compromisso é em um dia útil.";
}
