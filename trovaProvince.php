<?php

//INIZIALMENTE DOVEVA creare l'elenco solo per le province ma lo uso anche per le citta
//
//
// inclusione del file per la connessione
include "connessioneDB.php";
// chiamata alla funzione di connessione
$conn = connetti();

//DICHIARAZIONE variabili
//acquisizione delle informazioni da controllare
$tipo = $_GET['tipo'];
$query=$_GET['query'];


//eseguo la query
$ris = $conn->query($query);
//vedo se ci sono risultati
if ($ris->num_rows > 0) {
    //se si creo le varie opzioni
    while ($riga = $ris->fetch_assoc()) {
        //in value c'è l'id e in id c'è es. id_provincia_ROMA  (dove ci puo essere o provincia o roma in base a $tipo, anche se id non serve) e il nome della suddetta
        echo "<option id='".$tipo."_".$riga['nome']."' value='".$riga[$tipo]. "_" . $riga['nome']."' requierd>".$riga['nome']."</option>";
    }
    //se no
} else {
    echo "ERRORE DEL SISTEMA, REGIONE O PROVINCIA NON SONO PRESENTE";
}

?>
