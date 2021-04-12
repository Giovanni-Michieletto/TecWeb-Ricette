<?php
    session_start();
    require_once "dbConnection.php"; 
    if(!$_SESSION['logged'] || $_SESSION['logged']==false){
        header("Location: login.html",TRUE);
    }
    $page = file_get_contents('admin.html');
    $dbAccess = new DBAccess();          
    $connection = $dbAccess->openDBConnection(); 
    if($connection)  {
        $list = $dbAccess->getFile();  
        if ($list) {        
            foreach ($list as $cell) {
                $anteprima = substr($cell['Testo'],0,250) . " ...";
                $definition = '<div class="card">';
                    $definition .=  '<img src="'.$cell['Immagine'].'" alt="'.$cell['AltImmagine'].'">';
                    $definition .= '<div class="card-info-container">';
                        $definition .= '<div class="card-title">';
                            $definition .= '<h3>'.$cell['Nome'].'</h3>';
                        $definition .= '</div>';
                        $definition .= '<div class="card-info">';
                            $definition .= '<p>'.$anteprima.'</p>';
                        $definition .= '</div>';
                        $definition .= '<div class="card-footer">';
                            $definition .= '<div class="info">';
                                $definition .= '<p>Difficoltà: '.$cell['Difficolta'].'</p>';
                            $definition .= '</div>';
                            $definition .= ' <div class="tempo">';
                                $definition .= '<i class="far fa-clock"></i>';
                                $definition .= '<p>'.$cell['Tempo'].'</p>';
                            $definition .= '</div>';
                        $definition .= '</div>';
                    $definition .= '</div>';
                    $definition .= '<a href="updateFile('.$cell['ID'].','.$cell['Nome'].','.$cell['Difficolta'].','.$cell['Tempo'].','.$cell['Immagine'].','.$cell['AltImmagine'].','.$cell['Ingredienti'].','.$cell['Testo'].','.$cell['Hashtag'].')">Modifica</a>';
                    $definition .= '<a href="delete.php?ID='.$cell['ID'].'" />Elimina</a>';
                $definition .= '</div>';
            }
        }
        else {
            $definition = '<p>Nessun file presente</p>';  
        } 
        $page =  str_replace("<p>Errore di caricamento</p>",$definition,$page);
    }
    echo $page;
    
?>