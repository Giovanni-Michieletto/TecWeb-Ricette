<?php
    session_start();
    require_once "dbConnection.php"; 
    if(!$_SESSION['logged']){
        header("Location: login.html",TRUE);
    }
    $dbAccess = new DBAccess();          
    $connection = $dbAccess->openDBConnection(); 

    $ID = $_GET['ID'];
    $page = file_get_contents('compiledForm.html');
    $page = str_replace("Ricetta","Modifica Ricetta",$page);
    $page = str_replace("compiledForm.html","modify.php?ID=".$ID,$page);

    $dbAccess = new DBAccess();
    $connection = $dbAccess->openDBConnection();
    if($connection) {    
        $ricetta = $dbAccess->getFileID($ID);
        if($_POST) {
            $Nome = $_POST['Nome'];
            $Difficolta = $_POST['Difficolta'];
            $Tempo = $_POST['Tempo'];
            $AltImmagine = $_POST['AltImmagine'];
            $Ingredienti = $_POST['Ingredienti'];
            $Testo = $_POST['Testo'];
            $Hashtag = $_POST['Hashtag'];

            if($_FILES['Immagine']['name']) {
                $file = $_FILES['Immagine']['name'];
                $file = preg_replace("/[^A-Za-z0-9.]/", '', $file);
                $directory = $_SERVER['DOCUMENT_ROOT'] . '/TecWeb-Ricette/public/img/upload/';
                $dir = './public/img/upload/';
                $ImmagineUpload = $directory . $file;
                $Immagine = $dir . $file;
                move_uploaded_file($_FILES['Immagine']['tmp_name'],$ImmagineUpload);
            }
            else if($ricetta){
                $Immagine = $ricetta['Immagine'];
            }
            $list = $dbAccess->getFile();
            if($list) {
                foreach ($list as $cell) {
                    if($cell['ID']!=$ID) {
                        if($cell['Nome']==$Nome || $cell['Immagine']==$Immagine || $cell['Testo']==$Testo) {
                            $page = str_replace("Errore","Ricetta già presente",$page);
                            $page = str_replace('valueNome',$Nome,$page);
                            $page = str_replace('valueDifficoltà',$Difficolta,$page);
                            $page = str_replace('valueTempo',$Tempo,$page);
                            $page = str_replace('<input type="file" id="Immagine" name="Immagine" accept="image/*" title="Immagine o foto del risultato finale della ricetta" size="50" required/>', '<img src="'.$Immagine.'" alt="'.$AltImmagine.'">',$page);
                            $page = str_replace('valueAltImmagine',$AltImmagine,$page);
                            $page = str_replace('valueIngredienti',$Ingredienti,$page);
                            $page = str_replace('valueTesto',$Testo,$page);
                            $page = str_replace('valueHashtag',$Hashtag,$page);
                            $page = str_replace('Submit','Modifica',$page);
                            $page = str_replace('valueAction','modify.php?ID='.$ID,$page);
                            echo $page;
                            break;
                        }
                    }
                }
            }

            $update = $dbAccess->updateFile($ID,$Nome,$Difficolta,$Tempo,$Immagine,$AltImmagine,$Ingredienti,$Testo,$Hashtag);
            if($update) {
                $page = str_replace("Errore","Modifica andata a buon fine",$page);
                $page = str_replace('valueNome"',$Nome.'" readonly ',$page);
                $page = str_replace('valueDifficoltà"',$Difficolta.'" readonly ',$page);
                $page = str_replace('valueTempo"',$Tempo.'" readonly ',$page);
                $page = str_replace('valueAltImmagine"',$AltImmagine.'" readonly ',$page);
                $page = str_replace('>valueIngredienti',' readonly>'.$Ingredienti,$page);
                $page = str_replace('>valueTesto',' readonly>'.$Testo,$page);
                $page = str_replace('valueHashtag"',$Hashtag.'" readonly ',$page);
                $page = str_replace('<input type="file" id="Immagine" name="Immagine" accept="image/*" title="Immagine o foto del risultato finale della ricetta" size="50" required/>', '<img src="'.$Immagine.'" alt="'.$AltImmagine.'">',$page);
                $page = str_replace('Submit','Torna alla pagina amministrazione',$page);
                $page = str_replace('valueAction','admin.php',$page);
            }
            else {
                $page = str_replace("Errore","Errore nel caricamento",$page);
            } 
            echo $page;
        }
        else {
            if($ricetta) {
                $page = str_replace("Errore","Modificare i seguenti campi se necessario, per modificare l'immagine è necessario un nuovo inserimento",$page);
                $page = str_replace('valueNome',$ricetta['Nome'],$page);
                $page = str_replace('valueDifficoltà',$ricetta['Difficolta'],$page);
                $page = str_replace('valueTempo',$ricetta['Tempo'],$page);
                $page = str_replace('valueAltImmagine',$ricetta['AltImmagine'],$page);
                $page = str_replace('<input type="file" id="Immagine" name="Immagine" accept="image/*" title="Immagine o foto del risultato finale della ricetta" size="50" required/>', '<input type="file" id="Immagine" name="Immagine" accept="image/*" title="Immagine o foto del risultato finale della ricetta" size="50"/> <img src="'.$ricetta['Immagine'].'" alt="'.$ricetta['AltImmagine'].'">',$page);
                $page = str_replace('valueIngredienti',$ricetta['Ingredienti'],$page);
                $page = str_replace('valueTesto',$ricetta['Testo'],$page);
                $page = str_replace('valueHashtag',$ricetta['Hashtag'],$page);
                $page = str_replace('Submit','Modifica',$page);
                $page = str_replace('valueAction','modify.php?ID='.$ID,$page);
                echo $page;
            }
        }
    }  
?>