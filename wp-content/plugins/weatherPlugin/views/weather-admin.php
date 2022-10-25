<?php 

require_once("controller/backendController.php");


ob_start();

if(isset($_POST['send']) && isset($_POST['key']) && !empty($_POST['key'])){
    
    $apiKey = $_POST['key'];
    $api->sendApiKey($apiKey); 
  
}
    
?>

    <form method="post">

        <input type="text" placeholder='Api key' name="key">
        <input type="submit" value='send' name='send'>
        
    </form>
  
<?php 

    $adminPage = ob_get_clean();
    require_once('views/template.php');

?>