<?php require "config.php"; echo $host; ?>

<?php



class Connection{
    
    
    
    public function openConnection() {
        
        echo $this->host;
        
    }
    
    
    
}

?>

<?php


$obj = new Connection();
$obj->openConnection();

?>