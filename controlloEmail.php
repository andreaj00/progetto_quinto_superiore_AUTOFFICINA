
<?php

//file richiamato dai vari ajax per controllare che il cliente abbia una email
//
// inclusione del file per la connessione
include "connessioneDB.php";
// chiamata alla funzione di connessione
$conn = connetti();

//DICHIARAZIONE variabili
//acquisizione delle informazioni da controllare e isnerire
$username = $_GET['username'];
$password = $_GET['password'];
$codiceFiscale = $_GET['codiceFiscale'];
$email = $_GET['email'];


//controllo se ha inserito un'email
if ($email) {
    //se si vuol dire che non ne aveva una
    $query = "UPDATE cliente SET email='$email' WHERE codice_fiscale='" . $codiceFiscale . "'";
    if (!$conn->query($query)) {
        //dato duplicato 
        if ($conn->errno === 1062) {
            //creo il messaggio di errore
            $err = $conn->error;
            $err = str_replace("'", "*", $err);
            $err = str_replace("Duplicate entry ", "valore:", $err);
            $err = str_replace("for key ", " nel campo ", $err);
            $err .= " è gia in uso da parte di un altro utente!";
            echo "ATTENZIONE " . $err . ", quindi non è stato possibile completare il licenziamento";
        } else {

            echo "Codice Fiscale errato oppure non sei registrato preso l autofficina";
        }
    } else {
        echo "email registrata correttamente e ";
    }
}
$query = "SELECT id_cliente,email FROM cliente WHERE codice_fiscale='" . $codiceFiscale . "'";

$ris = $conn->query($query);
//eseguo la query
if ($ris->num_rows > 0) {
    $riga = $ris->fetch_assoc();
    //controllo che l'utente abbaia una email
    if ($riga['email']) {
        //se ha un'email
        //inserisco l'account nel database

        $password = md5($password);
        $query = "INSERT INTO registrazione_cliente (username,password,fk_id_cliente) VALUES ('$username','$password','" . $riga['id_cliente'] . "')";
        if (!$conn->query($query)) {
            //dato duplicato 
            if ($conn->errno === 1062) {
                //creo il messaggio di errore
                $err = $conn->error;
                $err = str_replace("'", "*", $err);
                $err = str_replace("Duplicate entry ", "valore:", $err);
                $err = str_replace("for key ", " nel campo ", $err);
                $err .= " è gia in uso da parte di un altro utente!";

                //controllo che il problema non sia la fk
                $problema = explode("*", $err)[3];
                if ($problema = "PRIMARY") {
                    echo "il cliente con il codice fiscale inserito ha gia un account";
                } else {
                    echo "ATTENZIONE " . $err . ", quindi non è stato possibile completare l inserimento</script>";
                }
            } else {
                die("<script>alert('Errore della query: " . $conn->error . ", " . $conn->error . ".')</script>");
            }
        } else {
            echo "creazione account effettuata correttamente";
        }
    } else {
        echo "email non presente";
    }
} else {
    echo "Codice Fiscale errato oppure non sei registrato preso l autofficina";
}
$conn->close();
?>