<?php
    class DBAccess {
        private const HOST = "localhost";
        private const USERNAME = "root";
        private const PASSWORD = "";
        private const NAME = "Ricette";
        private $connection;

        //Funzione di connessione
        public function openDBConnection() {
            $this->connection = mysqli_connect(DBAccess::HOST, DBAccess::USERNAME, DBAccess::PASSWORD, DBAccess::NAME);
            if (mysqli_error($this->connection)) {
                return false;
            }
            else {
                return true;
            }
        }

        //Funzione generale di estrazione dati
        public function getFile() {
            $querySelect = "SELECT * FROM Ricette ORDER BY ID DESC";
            $queryResult = mysqli_query($this->connection, $querySelect);
            if (!$queryResult || mysqli_num_rows($queryResult)==0) {
                return null;
            }
            else {
                $list = array();
                while($row = mysqli_fetch_assoc($queryResult)) {
                    $cell = array(
                        "ID" => $row["ID"],
                        "Nome" => $row["Nome"],
                        "Difficolta" => $row["Difficolta"],
                        "Tempo" => $row["Tempo"],
                        "Immagine" => $row["Immagine"],
                        "AltImmagine" => $row["AltImmagine"],
                        "Ingredienti" => $row["Ingredienti"],
                        "Testo" => $row["Testo"],
                        "Hashtag" => $row["Hashtag"],
                    );
                    array_push($list,$cell);
                    }
                return $list;
            }
        }

        public function getFileID($ID) {
            $querySelect = "SELECT * FROM Ricette WHERE ID=".$ID;
            $queryResult = mysqli_query($this->connection, $querySelect);
            if (!$queryResult || mysqli_num_rows($queryResult)==0) {
                return null;
            }
            else {
                $queryResult = mysqli_fetch_array($queryResult);
                $cell = array(
                    "ID" => $queryResult["ID"],
                    "Nome" => $queryResult["Nome"],
                    "Difficolta" => $queryResult["Difficolta"],
                    "Tempo" => $queryResult["Tempo"],
                    "Immagine" => $queryResult["Immagine"],
                    "AltImmagine" => $queryResult["AltImmagine"],
                    "Ingredienti" => $queryResult["Ingredienti"],
                    "Testo" => $queryResult["Testo"],
                    "Hashtag" => $queryResult["Hashtag"],
                );   
                return $cell;
            }
        }

        //Funzione per l'inserimento dei dati
        public function insertFile($Nome,$Difficolta,$Tempo,$Immagine,$AltImmagine,$Ingredienti,$Testo,$Hashtag) {
            $table = "Ricette(Nome,Difficolta,Tempo,Immagine,AltImmagine,Ingredienti,Testo,Hashtag)";
            $value ="(\"$Nome\",\"$Difficolta\",\"$Tempo\",\"$Immagine\",\"$AltImmagine\",\"$Ingredienti\",\"$Testo\",\"$Hashtag\")";
            $queryInsert = "INSERT INTO $table VALUES $value";
            $queryResult = mysqli_query($this->connection,$queryInsert);
            if(mysqli_affected_rows($this->connection) > 0) {
                return true;
            }
            else {
                return false;
            }
        }

        //Funzione modifica dati
        public function updateFile($ID,$Nome,$Difficolta,$Tempo,$Immagine,$AltImmagine,$Ingredienti,$Testo,$Hashtag) {
            $list = $this->getFile();
            foreach ($list as $cell) {
                if($ID == $cell['ID']) {
                    if($Immagine != $cell['Immagine']) {
                        $directory = $_SERVER['DOCUMENT_ROOT'] . str_replace('./','/TecWeb-Ricette/',$cell['Immagine']);
                        unlink($directory);
                    }
                    if($Nome==$cell['Nome'] && $Difficolta==$cell['Difficolta'] && $Tempo==$cell['Tempo'] && $Immagine==$cell['Immagine'] && $AltImmagine==$cell['AltImmagine'] && $Ingredienti==$cell['Ingredienti'] && $Testo==$cell['Testo'] && $Hashtag==$cell['Hashtag']) {
                        return true;
                    }
                }
            }
            $queryInsert = "UPDATE Ricette SET Nome=\"$Nome\", Difficolta=\"$Difficolta\", Tempo=\"$Tempo\", Immagine=\"$Immagine\", AltImmagine=\"$AltImmagine\", Ingredienti=\"$Ingredienti\", Testo=\"$Testo\", Hashtag=\"$Hashtag\" WHERE Ricette . ID=\"$ID\"";
            $queryResult = mysqli_query($this->connection,$queryInsert);
            if(mysqli_affected_rows($this->connection) > 0) {
                return true;
            }
            else {
                return false;
            }
        }

        //Funzione elimina dati
        public function deleteFile($ID) {
            $list = $this->getFile();
            if($list) {
                foreach ($list as $cell) {
                    if($ID == $cell['ID']) {
                        $directory = $_SERVER['DOCUMENT_ROOT'] . str_replace('./','/TecWeb-Ricette/',$cell['Immagine']);
                        unlink($directory);
                    }
                }
            }
            $queryInsert = "DELETE FROM Ricette WHERE Ricette . ID=\"$ID\"";
            $queryResult = mysqli_query($this->connection,$queryInsert);
            if(mysqli_affected_rows($this->connection) > 0) {
                return true;
            }
            else {
                return false;
            }
        }

        // Login
        public function getLogin() {
            $querySelect = 'SELECT * FROM Login';
            $queryResult = mysqli_query($this->connection, $querySelect);
            if (!$queryResult || mysqli_num_rows($queryResult)==0) {
                return null;
            }
            else {
                while($row = mysqli_fetch_assoc($queryResult)) {
                    $cell = array(
                        "Username" => $row["Username"],
                        "Password" => $row["Password"],
                    );
                }
                return $cell;
            }
        }
    }
?>