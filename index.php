<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "vendor/autoload.php";

use Osvaldoabel\Config;
// $teste = require_once('./app.php');

echo "<pre>";
$teste = Config::get('app.bebidas.item.nome.dgffgf');
print_r($teste);
exit;


// echo "<pre>";
// print_r($xml->load('arquivos/nota.xml')->addTag("novoNome", $content));
// echo "<pre>";
// echo "parou aqui...";
// exit;
