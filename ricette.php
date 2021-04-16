<?php
    require_once "dbConnection.php";
    $page = file_get_contents('ricette.html');

    $dbAccess = new DBAccess();          
    $connection = $dbAccess->openDBConnection(); 
    if($connection)  {
        $list = $dbAccess->getFile();  
        if ($list) { 
            $definition='';
            foreach ($list as $cell) {
                $anteprima = substr($cell['Testo'],0,250) . " ...";
                $definition .= '<div class="card">';
                    $definition .= '<a href="singolo.php?ID='.$cell['ID'].'">';
                        $definition .='<div class="card-img">';
                        $definition .=  '<img src="'.$cell['Immagine'].'" alt="'.$cell['AltImmagine'].'">';
                        $definition .= '</div>';
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
        else {
            $definition = '<p>Nessun file presente</p>';  
        } 
        $page =  str_replace("<p>Errore di caricamento</p>",$definition,$page);
    }
    echo $page;
?>