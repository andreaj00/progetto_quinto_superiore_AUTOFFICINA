
<?php

//file richiamato dai vari ajax per linserimento dei dati (gli insert si potevano fare sulla stessa pagina ma sarebbero insorti problemi dovuti ai refresh degli stessi)
//
// inclusione del file per la connessione
include "connessioneDB.php";
// chiamata alla funzione di connessione
$conn = connetti();

//DICHIARAZIONE variabili
//acquisizione delle informazioni da controllare
$query = $_GET['query'];


//eseguo la query
if (!$conn->query($query)) {
    //dato duplicato 
    if ($conn->errno === 1062) {
        //creo il messaggio di errore
        $err = $conn->error;
        $err = str_replace("'", "*", $err);
        $err = str_replace("Duplicate entry ", "valore:", $err);
        $err = str_replace("for key ", " nel campo ", $err);
        $err .= " è gia in uso da parte di un altro utente!";
        echo "ATTENZIONE " . $err . ", quindi non è stato possibile completare l inserimento</script>";
    } else {
        die("<script>alert('Errore della query: " . $conn->error . ", " . $conn->error . ".')</script>");
    }
} else {
    echo "Registrazione effettuata correttamente.";
}
$conn->close();
?>
