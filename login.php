<?php
    session_start();
    require_once "dbConnection.php"; 
    $page = file_get_contents('login.html');            
    if(isset($_POST['submit'])) {
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];
        $dbAccess = new DBAccess();
        $connection = $dbAccess->openDBConnection();
        if($connection) {
            $Username = md5($Username);
            $Password = md5($Password); 
            $Login = $dbAccess->getLogin();                 
            if($Login['Username']==$Username && $Login['Password']==$Password) {
                $_SESSION['logged'] = true;
                header('Location: admin.php',TRUE);
            }
            else {
                //da fare errore dati, aspetto la parte html
                echo $page;
            }
        }
        else {
            //da fare errore connessione, aspetto la parte html
            echo $page;
        }
    }
?>