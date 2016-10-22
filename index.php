<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "vendor/autoload.php";

use Osvaldoabel\Config;
$config = new Config();
echo "<pre>";
$teste = $config->get('app.fruits.items.item');
print_r($teste);
exit;
