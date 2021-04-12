<?php
    require_once "dbConnection.php";
    $ID = $_GET['ID'];
    $page = file_get_contents('singolo.html');
    $dbAccess = new DBAccess();
    $connection = $dbAccess->openDBConnection();
    if($connection) {
        $cell = $dbAccess->getFileID($ID);
        $Ingredienti = explode("\n",$cell['Ingredienti']);
        $definition = '<div id="title">';
            $definition .= '<h1>'.$cell['Nome'].'</h1>';
        $definition .= '</div>';
        $definition .= '<div class="info">';
            $definition .= '<p>'.$cell['Difficolta'].'</p>';
            $definition .= '<div class="tempo">';
            $definition .= '<i class="far fa-clock"></i>';
            $definition .= '<p>'.$cell['Tempo'].'</p>';
        $definition .= '</div>';
        $definition .= '<div id="image">';
            $definition .= '<img src="'.$cell['Immagine'].'" alt="'.$cell['AltImmagine'].'">';
        $definition .= '</div>';
        $definition .= '<div id="ingredienti" class="text">';
            $definition .= '<h2>Ingredienti</h2>';
            $definition .= '<ul>';
            foreach($Ingredienti as $element) {
                $definition .= '<li>'.$element.'</li>';
            }
            $definition .= '</ul>';
        $definition .= '</div>';
        $definition .= '<div id="ricetta" class="text">';
            $definition .= '<h2>Ricetta</h2>';
            $definition .= '<p>'.$cell['Testo'].'</p>';
        $definition .= '</div>';
        $page = str_replace("<p>Errore di caricamento</p>", $definition, $page); 
        }
    echo $page;
?>