<!DOCTYPE html>
<?php
session_start();
//controllo che sia loggato come amministratore
if (!isset($_SESSION['amministrazione'])) {
    //se non lo è lo mando al login
    header('Location: accessoAmministrazione.php');
}
?>
<html>
    <meta charset="UTF-8">
    <title>Registrazione meccanico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="stili/stileBase.css">        
    <link rel="stylesheet" type="text/css" href="stili/stileAmministrazione.css">

    <!--icona in alto vicino al titolo-->
    <link rel="icon" href="img/icona.ico" />
    <!-- usato per il menu laterale-->
    <link rel="stylesheet" type="text/css" href="stili/w3modificato.css">
    <!-- uasto per prendere le icone-->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <body>

        <!-- Sidebar -->
        <div class="w3-bar-block w3-animate-left sidebar" style="display:none;z-index:5;" id="mySidebar">
            <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>

            <a href="privataAmministrazione.php" class="w3-bar-item w3-button ">Home</a>
            <button class="w3-button w3-block w3-left-align" onclick="myAccFunc(this)">
                Operazioni clienti <span class="fa fa-caret-down"></span><span class="fa fa-caret-up" style="display:none"></span>
            </button>
            <div id="demoAcc" class="w3-hide w3-card  href-accordion">
                <a href="registrazione_cliente.php" class="w3-bar-item w3-button elementoAccordion">Registrazione cliente</a>
                <a href="registrazione_nuovo_veicolo.php" class="w3-bar-item w3-button elementoAccordion">Registrazione nuovo veicolo</a>
                <a href="crea_modifica_operazione.php" class="w3-bar-item w3-button elementoAccordion">Crea/Modifica operazione</a>
                <a href="rilascio_veicolo.php" class="w3-bar-item w3-button elementoAccordion">Rilascio veicolo</a>
            </div>
            <button class="w3-button w3-block w3-left-align" onclick="myAccFunc(this)">
                Registrazione oggetti Autofficina <span class="fa fa-caret-down"></span><span class="fa fa-caret-up" style="display:none"></span>
            </button>
            <div id="demoAcc" class="w3-hide w3-card href-accordion">
                <a href="registrazione_anagrafica_interventi.php" class="w3-bar-item w3-button elementoAccordion">Registrazione nuova anagrafica intervento</a>
                <a href="registrazione_prodotto.php" class="w3-bar-item w3-button elementoAccordion">Registrazione nuovo prodotto</a>
                <a href="registrazione_categoria.php" class="w3-bar-item w3-button elementoAccordion">Registrazione nuova categoria</a>
                <a href="registrazione_smaltimento.php" class="w3-bar-item w3-button elementoAccordion">Registrazione nuovo smaltimento</a>
                <a href="registrazione_marca.php" class="w3-bar-item w3-button elementoAccordion">Registrazione nuova marca</a>
                <a href="registrazione_modello.php" class="w3-bar-item w3-button  elementoAccordion">Registrazione nuovo modello</a>
            </div>

            <button class="w3-button w3-block w3-left-align" onclick="myAccFunc(this)">
                Registrazione personale <span class="fa fa-caret-down"></span><span class="fa fa-caret-up" style="display:none"></span>
            </button>
            <div id="demoAcc" class="w3-hide w3-card  href-accordion">
                <a href="registrazione_meccanico.php" class="w3-bar-item w3-button elementoAccordion bottoneCliccato">Registrazione meccanico</a>
                <a href="registrazione_amministrazione.php" class="w3-bar-item w3-button elementoAccordion">Registrazione amministrazione</a>
            </div>

            <button class="w3-button w3-block w3-left-align" onclick="myAccFunc(this)">
                Licenziamento personale <span class="fa fa-caret-down"></span><span class="fa fa-caret-up" style="display:none"></span>
            </button>
            <div id="demoAcc" class="w3-hide w3-card  href-accordion">
                <a href="licenziare_meccanico.php" class="w3-bar-item w3-button elementoAccordion">Licenziamento meccanico</a>
                <a href="licenziare_amministratore.php" class="w3-bar-item w3-button elementoAccordion">Licenziamento amministrazione</a>
            </div>

            <button class="w3-button w3-block w3-left-align" onclick="myAccFunc(this)">
                Modifica sconti e aliquote <span class="fa fa-caret-down"></span><span class="fa fa-caret-up" style="display:none"></span>
            </button>
            <div id="demoAcc" class="w3-hide w3-card  href-accordion">
                <a href="aggiorna_prodotto.php" class="w3-bar-item w3-button elementoAccordion">Modifica percentuale sconto e aliquota prodotto</a>
                <a href="aggiorna_anagrafica_intervento.php" class="w3-bar-item w3-button elementoAccordion">Modifica percentuale sconto e aliquota anagrafica intervento</a>
            </div>

            <button class="w3-button w3-block w3-left-align" onclick="myAccFunc(this)">
                Modifica dati clienti e personale <span class="fa fa-caret-down"></span><span class="fa fa-caret-up" style="display:none"></span>
            </button>
            <div id="demoAcc" class="w3-hide w3-card  href-accordion">
                <a href="modifica_amministrazione.php" class="w3-bar-item w3-button elementoAccordion">Modifica propri dati personali</a>
                <a href="RicCliente.php" class="w3-bar-item w3-button elementoAccordion">Modifica dati personali cliente</a>
                <a href="RicMeccanico.php" class="w3-bar-item w3-button elementoAccordion">Modifica dati personali meccanico</a>
            </div>
            <a href="index.php" class="w3-bar-item w3-button">Logout</a>
        </div>

        <!-- Page Content -->
        <div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

        <div>
            <button class="w3-button  w3-xxlarge" onclick="w3_open()"  align="left">&#9776;</button><span class="idPersonale" style="right:0">
                <?php
                // inclusione del file per la connessione
                include "connessioneDB.php";
                // chiamata alla funzione di connessione
                $conn = connetti();
                $qry = "SELECT nome,cognome FROM amministrazione WHERE id_amministrazione='" . $_SESSION['id'] . "'";

                $result = $conn->query($qry);

                while ($row = $result->fetch_assoc()) {
                    echo "Utente n°<span id='id'>" . $_SESSION['id'] . "</span>:<b> " . $row['nome'] . " " . $row['cognome'] . " </b>";
                }

                $conn->close();
                ?></span>
            <div class="w3-container"><h1 style="text-align: center;">Registrazione meccanico</h1>
                <form action="" method="post">
                    <center>
                        <table>
                            <tr>
                                <td>
                                    <table>
                                        <tr><td>Nome<span style="color: #990000;">*</span>:</td> <td><input type="text" name="nome" placeholder="Inserire nome" maxlength="20" required></td></tr>
                                        <tr><td>Cognome<span style="color: #990000;">*</span>:</td> <td><input type="txt" name="cognome" placeholder="Inserire cognome" maxlength="20" required></td></tr>						
                                        <tr><td>Data di nascita<span style="color: #990000;">*</span>:</td> <td><input type="date" name="nascita"  min="1900-01-01" max="2001-01-01"  required></td></tr>
                                        <tr><td>Codice Fiscale<span style="color: #990000;">*</span>:</td> <td><input type="text" name="codiceF" placeholder="Inserire codice fiscale" maxlength="16" required></td></tr>
                                        <tr><td>Telefono<span style="color: #990000;">*</span>:</td> <td><input type="int" name="tel" placeholder="Inserire numero di telefono" maxlength="10" required></td></tr>
                                        <tr><td>Email:</td> <td><input type="email" name="email" placeholder="Inserire email" maxlength="30" required></td></tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr><td>Regione<span style="color: #990000;">*</span>:</td>
                                            <td><select id="r" name="r" onchange="cambioRegione()" required>
                                                    <option id="0" value="0">Scegliere una regione</option>
                                                    <?php
                                                    // chiamata alla funzione di connessione
                                                    $conn = connetti();

                                                    // costruzione ed esecuzione query
                                                    $qry = "SELECT * FROM regione ORDER BY nome;";
                                                    $result = $conn->query($qry);

                                                    // popolamento casella combinata
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<OPTION id = 'id_regione_" . $row['nome'] . "' value = '" . $row['id_regione'] . "_" . $row['nome'] . "' >" . $row['nome'] . "</OPTION>";
                                                    }
                                                    ?>
                                                </select></td></tr>
                                        <tr><td><span id="sP">Provincia<span style="color: #990000;">*</span>:</td>
                                            <td><select id="p" name="p"  onchange="cambioProvincia()" required>
                                                    <option >Scegliere una provincia</option>

                                                </select></span></td></tr>
                                        <tr><td><span id="sC">Città<span style="color: #990000;">*</span>:</td>
                                            <td><select id="c" name="c" required>
                                                    <option >Scegliere una città</option>
                                                </select></span></td></tr>

                                        <tr><td>Via<span style="color: #990000;">*</span>:</td> <td><input type="text" name="via" placeholder="Via" maxlength="20" required></td></tr>
                                        <tr><td>Civico<span style="color: #990000;">*</span>:</td> <td><input size="8" type="text" name="civico" placeholder="Civico" maxlength="6" required></td></tr>
                                        <tr><td>CAP<span style="color: #990000;">*</span>:</td> <td><input size="7" type="text" name="cap" placeholder="CAP" maxlength="5" required></td></tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                            <table>
                                <tr>
                                    <td align="center">
                                        <input name="submit" type="submit" class='bottone'>
                                    </td>
                                </tr>
                            </table>
                            </tr>
                        </table>
                        <center>
                            </form>
                            </div>
                            </div>

                            <script>
                                function cambioRegione() {
                                    var xhttp = new XMLHttpRequest();
                                    xhttp.onreadystatechange = function () {
                                        if (this.readyState == 4 && this.status == 200) {
                                            //uso il trim che elimina gli sazi e gli a capo
                                            var risp = this.responseText.trim();
                                            //prendo il select delle province e ci metto il risultato dell'ajax
                                            document.getElementById("p").innerHTML = '<option>Scegliere una provincia</option>';
                                            document.getElementById("p").innerHTML += risp;
                                            cambioProvincia();
                                        }
                                    };
                                    //prendo la regione selezionata
                                    var regione = document.getElementById("r").value;
                                    //prendo il secondo elemento del value di regione es.(1_LAZIO)
                                    regione = regione.split("_")[1];
                                    //creo la query
                                    var query = "SELECT provincia.* FROM provincia,regione WHERE id_regione=fk_id_regione AND regione.nome='" + regione + "' ORDER BY provincia.nome";


                                    xhttp.open("GET", "trovaProvince.php?query=" + query + "&tipo=id_provincia", true);
                                    xhttp.send();
                                }


                                function cambioProvincia() {
                                    var xhttp = new XMLHttpRequest();
                                    xhttp.onreadystatechange = function () {
                                        if (this.readyState == 4 && this.status == 200) {
                                            //uso il trim che elimina gli sazi e gli a capo
                                            var risp = this.responseText.trim();
                                            //prendo il select delle province e ci metto il risultato dell'ajax
                                            document.getElementById("c").innerHTML = '<option>Scegliere una citta</option>';
                                            document.getElementById("c").innerHTML += risp;
                                        }
                                    };
                                    //prendo la regione selezionata
                                    var regione = document.getElementById("r").value;
                                    //prendo il secondo elemento del value di regione es.(1_LAZIO)
                                    regione = regione.split("_")[1];
                                    var provincia = document.getElementById("p").value;
                                    //prendo il secondo elemento del value di provincia es.(1_ROMA)
                                    provincia = provincia.split("_")[1];
                                    //creo la query
                                    var query = "SELECT citta.* FROM citta,provincia,regione WHERE id_provincia=citta.fk_id_provincia AND id_regione=citta.fk_id_regione AND regione.nome='" + regione + "' AND provincia.nome='" + provincia + "' ORDER BY citta.nome";
                                    xhttp.open("GET", "trovaProvince.php?query=" + query + "&tipo=id_citta", true);
                                    xhttp.send();
                                }

                                //apro la sidebar
                                function w3_open() {
                                    document.getElementById("mySidebar").style.display = "block";
                                    document.getElementById("myOverlay").style.display = "block";
                                }

                                //chiudo la sidebar
                                function w3_close() {
                                    document.getElementById("mySidebar").style.display = "none";
                                    document.getElementById("myOverlay").style.display = "none";
                                }

                                //usato per gli accordion della navbar
                                function myAccFunc(y) {
                                    var x = y.nextElementSibling;
                                    //vedo se ha la classe show(vuol dire che è aperto)
                                    if (x.className.indexOf("w3-show") == -1) {
                                        //lo apro
                                        x.className += " w3-show";
                                        //cambio l'icona
                                        y.children[0].style.display = "none";
                                        y.children[1].style.display = "inline";
                                    } else {
                                        //lo chiudo
                                        x.className = x.className.replace(" w3-show", "");
                                        //cambio l'icona
                                        y.children[0].style.display = "inline";
                                        y.children[1].style.display = "none";
                                    }
                                }
                            </script>

                            <?php
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $nascita = $_POST['nascita'];
                                $nascita = date('Y-m-d', strtotime($nascita));
                                list($y, $m, $d) = explode('-', $nascita);
                                $timezone = date("Y-m-d");
                                list($y2, $m2, $d2) = explode('-', $timezone);
                                $control = $y2 - 17;
                                if (isset($_POST['submit']) && ($control > $y)) {
                                    $nome = $_POST['nome'];
                                    $cognome = $_POST['cognome'];
                                    $codF = $_POST['codiceF'];
                                    $codF = strtoupper($codF); //mette il codice fiscale in maiuscolo
                                    $telefono = $_POST['tel'];
                                    $email = $_POST['email'];
                                    $nascita = $_POST['nascita'];

                                    $nascita = date('Y-m-d', strtotime($nascita));


                                    $citta = $_POST['c'];
                                    //prendo il primo elemento del value di citta es.(1_ROMA)
                                    $citta = explode("_", $citta)[0];
                                    $provincia = $_POST['p'];
                                    $provincia = explode("_", $provincia)[0];
                                    $regione = $_POST['r'];
                                    $regione = explode("_", $regione)[0];
                                    $via = $_POST['via'];
                                    $civico = $_POST['civico'];
                                    $cap = $_POST['cap'];

                                    //registro meccanico
                                    $qry = "INSERT INTO localita (via, civico, cap, fk_id_citta, fk_id_provincia, fk_id_regione) VALUES ('" . $via . "','" . $civico . "','" . $cap . "','" . $citta . "','" . $provincia . "','" . $regione . "')";
                                    // esecuzione della query inserimento localita
                                    if ($conn->query($qry)) {
                                        //localita inserita
                                        //acquisisco l'id della localita
                                        $id_localita = $conn->insert_id; //cquisice l'ultimo id inserito'
                                        //registro il cliente
                                        $qry = "INSERT INTO meccanico (nome, cognome,codice_fiscale ,data_nascita,fk_id_localita,telefono,email) VALUES ('$nome', '$cognome', '$codF', '$nascita','$id_localita','$telefono', NULLIF('$email',''))";

                                        echo "<script>alert('$qry')</script>";
                                        // esecuzione della query
                                        if (!$conn->query($qry)) {
                                            //dato duplicato 
                                            if ($conn->errno === 1062) {
                                                //creo il messaggio di errore
                                                $err = $conn->error;
                                                $err = str_replace("'", "*", $err);
                                                $err = str_replace("Duplicate entry ", "valore:", $err);
                                                $err = str_replace("for key ", " nel campo ", $err);
                                                $err .= " è gia in uso da parte di un altro utente!";
                                                die("<script>alert('ATTENZIONE " . $err . ", quindi non è stato possibile completare l inserimento')</script>");
                                            } else {
                                                die("<script>alert('Errore della query: " . $conn->error . ", " . $conn->error . ".')</script>");
                                            }
                                        } else {
                                            echo "<script>alert('Registrazione effettuata correttamente.')</script>";
                                            //erindirizzo alal home per evitare eventuali problemi con la ricarica di pagina, non uso header perchè mi da errore dato che ho gia stampato qualcosa
                                            echo "<script> window.location.replace('registrazione_meccanico.php') </script>";
                                        }
                                    } else {
                                        echo "<script>alert('NON è STATA POSSIBILE INSERIRE LA SUA RESIDENZA QUINDI LA SUA REGISTRAZIONE NON è ANDAtA A BUON FINE, RICHIEDA ALL ASSISTENZA')</script>";
                                    }
                                } else {
                                    echo "La data deve essere valida (minimo 18 anni)";
                                }
                                $conn->close();
                            }
                            ?>
                            </body>
                            </html>
