<?php
    session_start();
    require_once "dbConnection.php"; 
    if(!$_SESSION['logged']){
        header("Location: login.html",TRUE);
    }
    $ID = $_GET['ID'];
    $page = file_get_contents('compiledForm.html');
    $page = str_replace("Ricetta","Eliminazione ricetta",$page);
    $page = str_replace("compiledForm.html","delete.php?ID=".$ID,$page);
    $dbAccess = new DBAccess();          
    $connection = $dbAccess->openDBConnection(); 
    if($connection)  {
        if(isset($_GET['value'])) {
            $dbAccess->deleteFile($ID);  
            header('Location: admin.php',TRUE);
        }
        else {
            $list = $dbAccess->getFile();
            if($list) {
                foreach ($list as $cell) {
                    if($cell['ID'] == $ID) {
                        $page = str_replace("Errore","Conferma eliminazione per procedere",$page);
                        $page = str_replace('valueNome"',$cell['Nome'].'" readonly ',$page);
                        $page = str_replace('valueDifficoltà"',$cell['Difficolta'].'" readonly ',$page);
                        $page = str_replace('valueTempo"',$cell['Tempo'].'" readonly ',$page);
                        $page = str_replace('valueAltImmagine"',$cell['AltImmagine'].'" readonly ',$page);
                        $page = str_replace('>valueIngredienti',' readonly>'.$cell['Ingredienti'],$page);
                        $page = str_replace('>valueTesto',' readonly>'.$cell['Testo'],$page);
                        $page = str_replace('valueHashtag"',$cell['Hashtag'].'" readonly ',$page);
                        $page = str_replace('<input type="file" id="Immagine" name="Immagine" accept="image/*" title="Immagine o foto del risultato finale della ricetta" size="50" required/>', '<img src="'.$cell['Immagine'].'" alt="'.$cell['AltImmagine'].'">',$page);
                        $page = str_replace('Submit','Conferma eliminazione',$page);
                        $page = str_replace('valueAction','delete.php?ID='.$ID.'&value=delete',$page);
                        echo $page;
                    }
                }
            }
        }
    }
    else {
        echo "Errore di connessione al database";
        echo $page;
    }
    
?>