<?php
    require_once "dbConnection.php";
    session_start();
    $find = $_POST['find'];
    $page = file_get_contents('ricette.html');
    $dbAccess = new DBAccess();          
    $connection = $dbAccess->openDBConnection();
    if($connection)  {
        $list = $dbAccess->getFile();  
        if ($list) {  
            foreach ($list as $cell) {
                if(strpos(strtolower($cell['Nome']),strtolower($cerca)) || strpos(strtolower($cell['Ingredienti']),strtolower($cerca)) ||  strpos(strtolower($cell['Testo']),strtolower($cerca)) || strpos(strtolower($cell['Hashtag']),strtolower($cerca))){
                    $anteprima = substr($cell['Testo'],0,250) . " ...";
                    $definition = '<div class="card">';
                        $definition .= '<a href="singolo.php?ID='.$cell['ID'].'">';
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
                        $definition .= '</a>';
                    $definition .= '</div>';
                }
            }
            if(!$definition)
                $definition = '<p>Nessuna ricetta rispetta la ricerca</p>'; 
        }
        else {
            $definition = '<p>Nessun ricetta presente</p>';  
        } 
        $page =  str_replace("<p>Errore di caricamento</p>",$definition,$page);
    }
    echo $page;
?>