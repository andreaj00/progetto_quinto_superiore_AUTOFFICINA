

<?php

//INIZIALMENTE DOVEVA SERVIRE SOLO PER CONTROLLARE L?AMMINSITRAZIONE MA RICEVENDO LA QUERY DALA APGINA DI CARICAMENTO ,
//LA POSSO USARE SIA PER L?AMMINISTRAZIONE CHE PER IL CLIENTE
//
//
// inclusione del file per la connessione
include "connessioneDB.php";
// chiamata alla funzione di connessione
$conn = connetti();

//DICHIARAZIONE variabili
//acquisizione delle informazioni da controllare
$username = $_GET['username'];
$password = $_GET['password'];
$tipo = $_GET['tipo'];// tipo puo assumere i valori "cliente"  o "amministrazione"
$query = "SELECT * FROM registrazione_" . $tipo;


$nonTrovato = true;

//echo $username." ".$password;
//cripto la password(l'ho criptata acneh quando l'ho registrata)
$password=md5($password);
//
//eseguo la query
$ris = $conn->query($query);

//vedo se ci sono risultati
if ($ris->num_rows > 0) {
    //se si controllo riga per riga se trovo l'account
    while ($riga = $ris->fetch_assoc()) {
        //cerco lo username
        if ($username == $riga["username"]) {
            //lo trovo
            $nonTrovato = false;
            if ($password == $riga["password"]) {
                //creo le variabili di sessione che mi serviranno per identificare chi è l'utente
                //faccio una query che mi restituisce l'id del user, cosi mi semplifico le future query
                echo "accesso consentito";
                session_start();
                $_SESSION["id"] = trova($tipo,$username);
                //vairabile usata come flag per controllare chi abbia fatto il login
                $_SESSION[$tipo]=true;
                
                //reindirizzamento alla pagina privata
                //header('Location: privataAmministrazione.php');
            } else {
                //dico che la password è sbagliata
                echo "PASSWORD ERRATA";
            }
        }
    }
    //se non non lo username
    if ($nonTrovato) {
        echo "NON ESISTE QUESTO USERNAME";
    }
} else {
    echo "ERRORE DEL SISTEMA, NON SONO PRESENTI ACCOUNT DELL'AMMINISTRAZIONE";
}
$conn->close();



//usato per effettuare la query con cui trovo l'id dell'impiegato o del cliente
function trova($tipo, $username) {
    $conn = connetti();
    $query = "SELECT fk_id_" . $tipo . " "
            . "FROM registrazione_" . $tipo . " "
            . "WHERE username='" . $username."'";


    //eseguo la query
    $ris = $conn->query($query);

    //in teoria dovrebbe restituire solo una risposta, ma controllo lo stesso
    if ($ris->num_rows>0) {
        while ($riga = $ris->fetch_assoc()) {
            $id = $riga["fk_id_" . $tipo];
        }
    } else {
        $id = 0;
        echo "ERRORE DEL SISTEMA, ci sono piu username uguali in registrazione_" . $tipo;
    }
    return $id;
}
?>
