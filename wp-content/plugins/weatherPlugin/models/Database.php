<?php

abstract class Database
{
   
    public function connect() //fonction de connextion à la base
    {
        try
        {
            $bdd = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    
            return $bdd;
         
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
        
}

