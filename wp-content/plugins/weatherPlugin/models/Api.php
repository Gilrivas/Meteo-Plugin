<?php 
require_once("Database.php");

class API extends Database{

    public function deleteTable(){
        $checkTable = $this->connect()->prepare("DROP TABLE IF EXISTS communes"); 
        $checkTable->execute();
        
       
    }
    public function createTable(){
        $createTable = $this->connect()->prepare("CREATE TABLE `communes` (`id_commune` int(11) NOT NULL AUTO_INCREMENT, `code_commune` int(6) NOT NULL, `nom_commune` varchar(30) NOT NULL, PRIMARY KEY(id_commune)) ENGINE = MyISAM DEFAULT CHARSET=latin1");
        $createTable->execute();
        
       
    }

    public function insertVilleData(){

        $url = "https://geo.api.gouv.fr/communes?fields=code,nom/";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $output = curl_exec($ch);
        $curl_error = curl_error($ch);
        curl_close($ch);
        
        $parsedData = json_decode($output, true);

        $checkAll = $this->connect()->prepare("SELECT * FROM communes WHERE code_commune = :code AND nom_commune = :nom");
        $insertCode = $this->connect()->prepare("INSERT INTO communes (code_commune, nom_commune) VALUES (:code, :nom)");

        $exist = $checkAll->fetchAll();

        foreach ($parsedData as $key => $value) {
            $nom = $value['nom'];
            $code = $value['code'];

            $checkAll->bindValue(':code', $code, PDO::PARAM_STR);
            $checkAll->bindValue(':nom', $nom, PDO::PARAM_STR);
            $checkAll->execute();

            
            if ($exist != false) {
                $msg = "your database its updated!";
                break;

            }
            else { 
            
                $insertCode->bindParam(':code', $code, PDO::PARAM_STR);
                $insertCode->bindParam(':nom', $nom, PDO::PARAM_STR);
                $insertCode->execute(); 
               
            }
        }
    }

    public function sendApiKey($key){
        $checkKey = $this->connect()->prepare("SELECT * FROM `wp_options` WHERE option_name = 'api_key'");
        $checkKey->execute();
        $exist = $checkKey->fetch();

        if ($exist != false) {
            $update = $this->connect()->prepare("UPDATE `wp_options` SET `option_value` = :apikey WHERE option_name = 'api_key'");
            $update->bindValue(':apikey', $key, PDO::PARAM_STR);
            $update->execute();
            echo "api key updated";
            
        }else{
            $insertKey = $this->connect()->prepare("INSERT INTO `wp_options` (`option_name`, `option_value`) VALUES ('api_key', :api_key)");
            $insertKey->bindValue(':api_key', $key, PDO::PARAM_STR);
            $insertKey->execute(); 
            echo "Added Api Key";
        }
    }

}