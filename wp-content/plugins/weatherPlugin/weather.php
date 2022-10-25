<?php
/**
* Plugin Name: Weather
* Plugin URI:   
* Description: Plugin Meteo
* Version: alpha
* Author: Jorge Gil Rivas
* Author URI: 
* Requires at least: 4.0
* Tested up to: 4.3
*
*/
defined( 'ABSPATH' ) or die( 'opss' );

require_once("controller/backendController.php");
require_once("controller/frontendController.php");

if(empty($_GET['page'])){
    require_once('views/template.php');
 }else{
     switch($_GET['page']){
         case 'plusfort': mecfaitjouerplusfort();
         break;
         case 'moinsfort': mecfaitjouermoinsfort();
         break;
         case 'gojorge': jorgesorstoilabaguettedunez();
         break;
         default: echo "<h2>404 - Désolé cette page n'existe pas :(</h2>";
     }
 }




?>

