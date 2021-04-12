<?php
    session_start();
    require_once "dbConnection.php"; 
    if(!$_SESSION['logged']){
        header("Location: login.html",TRUE);
    }
    $ID = $_GET['ID'];
    $page = file_get_contents('admin.html');
    $dbAccess = new DBAccess();          
    $connection = $dbAccess->openDBConnection(); 
    if($connection)  {
        $list = $dbAccess->deleteFile($ID);  
        header('Location: admin.php',TRUE);
    }
    else {
        echo "Errore di connessione al database";
    }
?>