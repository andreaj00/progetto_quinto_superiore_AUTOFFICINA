
<?php

// funzione per la connessione a MySQL
function connetti() {
    // Create connection
    $conn = new mysqli("localhost", "root", "", "autofficinaphp");

    // Check connection
    if ($conn->connect_error) {
        die("errore di connessione(" . $myconn->connect_erno . ")" . $myconn->connect_error);
    }
    return $conn;
}


?>
