<?php
require __DIR__ . '/../patternrouter.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
session_start();

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new PatternRouter();
$router->route($uri);

?>
