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
                $page = str_replace('<strong>Inserire utente e password</strong>','<strong class="error">Password o username errati - Inserire utente e password corretti</strong>',$page);
                echo $page;
            }
        }
        else {
            $page = str_replace('<strong>Inserire utente e password</strong>','<strong class="error">Errore di collegamento al database</strong>',$page);
            echo $page;
        }
    }
?>