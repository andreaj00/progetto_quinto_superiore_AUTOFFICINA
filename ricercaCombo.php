

<?php

//UTILIZZATO PER LA RICERCA DI INFORMAZIONI PER LA PAGINA aggiungi_intervento.php
//restituisce una stringa in cui i valori sono divisi da *£*, la loro ulteriore divisione spetta a aggiungi intervento 
//
//
// inclusione del file per la connessione
include "connessioneDB.php";
// chiamata alla funzione di connessione
$conn = connetti();

//DICHIARAZIONE variabili
//acquisizione delle informazioni da controllare
$query = $_GET['query'];
$nColonne = $_GET['nColonne'];
//eseguo la query
$ris = $conn->query($query);

//in teoria dovrebbe restituire solo una risposta, ma controllo lo stesso
if ($ris->num_rows > 0) {
    while ($riga = $ris->fetch_row()) {
        for($i=0;$i<$nColonne;$i++){
            echo "*£*$riga[$i]";
        }
    }
} else {
    //non stampo niente nel caso non ci siano risultati
}

$conn->close();
?>
