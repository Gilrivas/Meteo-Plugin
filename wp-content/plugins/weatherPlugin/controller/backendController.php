<?php 
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'\weather\wp-content\plugins\weatherPlugin\models\Api.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'\weather\wp-content\plugins\weatherPlugin\models\Functions.php');

$api = new API;
$api->insertVilleData();





