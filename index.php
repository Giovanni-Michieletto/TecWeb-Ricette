<?php
    require_once "dbConnection.php";
    $page = file_get_contents('index.html');
    $dbAccess = new DBAccess();
    $connection = $dbAccess->openDBConnection();
    if($connection) {
        $list = $dbAccess->getFile();
        if ($list) { 
            $definition = '';
            $iterator = 0;
            foreach ($list as $cell) {
                $iterator++;
                if($iterator<6) {
                    $definition .= '<div class="esempio">';
                        $definition .= '<a href="singolo.php?ID='.$cell['ID'].'"><img src="'.$cell['Immagine'].'" alt="'.$cell['AltImmagine'].'"></a>';
                    $definition .= '</div>';
                }
            }
        }
    }
    $page = str_replace('<p>Galleria</p>',$definition,$page);
    echo $page;
?>