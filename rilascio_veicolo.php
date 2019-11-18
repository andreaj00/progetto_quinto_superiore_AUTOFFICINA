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
    <title>Rilascio veicoli</title>
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
                <a href="rilascio_veicolo.php" class="w3-bar-item w3-button elementoAccordion bottoneCliccato">Rilascio veicolo</a>
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
                <a href="registrazione_meccanico.php" class="w3-bar-item w3-button elementoAccordion">Registrazione meccanico</a>
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
            <div class="w3-container">
                <h1 style="text-align: center;">Rilascia Veicolo</h1>
                <h6 style="text-align: center;">(solo i veicoli che hanno finito l'operazione possono essere rilasciati)</h6>
                <form action="" method="post" align="center">
                    <select name="veicolo" >
                        <option value='-1'>- - - -</option>
                        <?php
                        // chiamata alla funzione di connessione
                        $conn = connetti();

                        // costruzione ed esecuzione query
                        $qry = "SELECT * FROM operazione WHERE data_ritiro IS NULL AND data_fine_effettiva IS NOT NULL ORDER BY fk_targa";

                        $result = $conn->query($qry);
                        echo $result->num_rows;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['id_operazione'] . "'>" . $row['fk_targa'] . "</option>";
                            }
                        } else {
                            echo "Veicoli non in lavorazione.";
                        }
                        ?>
                    </select>
                    <br><br>
                    <input class="bottone" type="submit" align="center" value="Rilascio veicolo">
                </form>

                <script>
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
                if ($_SERVER['REQUEST_METHOD'] === "POST") {
                    $id_operazione = $_POST['veicolo'];
                    //se è stato selezionato un veicolo
                    if (isset($id_operazione) && $id_operazione != '-1') {
                        // costruzione ed esecuzione query
                        $qry = "UPDATE operazione SET data_ritiro=now() WHERE id_operazione='$id_operazione'";
                        if ($conn->query($qry)) {

                            //creo la fattura
                            $filename = "fatture/fattura_operazione_" . $id_operazione . ".csv";
                            $file = fopen($filename, "w");

                            $fattura = "\n TARGA VEICOLO: ";
                            $qry = "SELECT fk_targa FROM operazione WHERE id_operazione='" . $id_operazione . "'";
                            //dovrei avere solo una riga
                            if ($result = $conn->query($qry)) {
                                while ($row = $result->fetch_assoc()) {
                                    $fattura .= " " . $row['fk_targa'] . " \n PRODOTTO; QUANTITA; COSTO_UNITARIO; PERC_ALIQUOTA; PERC_SCONTO; COSTO_TOT_PRODOTTO; \n";
                                }
                            }

                            //Calcolo importi prodotto
                            $qry = "SELECT * FROM operazione o, comporre c, intervento i, utilizzare u, prodotto p WHERE o.id_operazione=c.fk_id_operazione AND c.fk_id_intervento=i.id_intervento AND i.id_intervento=u.fk_id_intervento AND u.fk_id_prodotto=p.id_prodotto AND o.id_operazione='$id_operazione'";


                            $importo_iniziale = 0;
                            $importo_sconto = 0;
                            $importo_aliquota = 0;
                            $op = 0;
                            $result = $conn->query($qry);
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {

                                    $importo_prodotto_iniziale = ($row['costo'] * $row['quantita']);
                                    $importo_prodotto_sconto = ($row['costo'] * $row['percentuale_sconto'] / 100 * $row['quantita']);
                                    $importo_prodotto_aliquota = ($row['costo'] * $row['aliquota_da_aggiungere'] / 100 * $row['quantita']);
                                    $importo_prodotto_tot = $importo_prodotto_iniziale + $importo_prodotto_aliquota - $importo_prodotto_sconto;


                                    $importo_iniziale += $importo_prodotto_iniziale;
                                    $importo_sconto += $importo_prodotto_sconto;
                                    $importo_aliquota += $importo_prodotto_aliquota;
                                    $op = $row['fk_id_operazione'];

                                    $fattura .= " " . $row['nome'] . ";" . $row['quantita'] . ";" . $row['costo'] . ";" . $row['aliquota_da_aggiungere'] . ";" . $row['percentuale_sconto'] . ";" . $importo_prodotto_tot . "; \n";
                                }
                            } else {
                                echo "<script>alert('problema con la lettura dei valori dal database, " . $conn->error . "');</script>";
                            }

                            $fattura .= "\n \n  INTERVENTO; COSTO_ORARIO; ORE; PERC_ALIQUOTA; PERC_SCONTO; COSTO_TOT_INTERVENTO; \n";

                            //Calcolo importi intervento
                            $qry = "SELECT * FROM operazione o, comporre c, intervento i, anagrafica_intervento a WHERE o.id_operazione=c.fk_id_operazione AND c.fk_id_intervento=i.id_intervento AND a.id_anagrafica_intervento=i.fk_id_anagrafica_intervento AND o.id_operazione='$id_operazione'";

                            $result = $conn->query($qry);
                            while ($row = $result->fetch_assoc()) {
                                $importo_intervento_iniziale = ($row['costo_orario'] * $row['tempo_previsto']);
                                $importo_intervento_sconto = (($row['costo_orario'] * $row['tempo_previsto']) * $row['percentuale_sconto'] / 100);
                                $importo_intervento_aliquota = (($row['costo_orario'] * $row['tempo_previsto']) * $row['aliquota_da_aggiungere'] / 100);
                                $importo_intervento_tot = $importo_intervento_iniziale + $importo_intervento_aliquota - $importo_intervento_sconto;

                                $importo_iniziale += $importo_intervento_iniziale;
                                $importo_sconto += $importo_intervento_sconto;
                                $importo_aliquota += $importo_intervento_aliquota;

                                $fattura .= " " . $row['nome'] . ";" . $row['costo_orario'] . ";" . $row['tempo_previsto'] . ";" . $row['aliquota_da_aggiungere'] . ";" . $row['percentuale_sconto'] . "; " . $importo_intervento_tot . " ; \n";
                            }
                            $importo_finale = $importo_iniziale + $importo_aliquota - $importo_sconto;


                            $qry = "INSERT INTO	fattura( `data_emissione`, `importo_iniziale`, `importo_iva`, `importo_sconto`, `importo_finale`, `fk_id_operazione`) VALUES ( CURDATE(), '$importo_iniziale', '$importo_aliquota', '$importo_sconto', '$importo_finale', '$op')";

                            $result = $conn->query($qry);
                            if ($result) {
                                //se l'inserimento della fattura è andata a buon fine
                                echo "<script>alert('rilascio effettuato con successo.');</script>";

                                //finisco la fattura
                                $fattura .= "\n \n operazione n : $op "
                                        . "\n importo iniziale:  $importo_iniziale "
                                        . "\n importo sconto:  $importo_sconto "
                                        . "\n importo aliquota: $importo_aliquota "
                                        . "\n IMPORTO FINALE: $importo_finale ";


                                // scrivo la fattura
                                fwrite($file, $fattura);
                                //chiudo la fattura
                                fclose($file);

                                //richiamo un'altro file php che mi fa afare il download della fattura

                                echo "<script> window.location.replace('download.php?file=" . $filename . "') </script>";

                                //reindirizzo cosi aggiorna l'elenco
                                echo "<script> window.location.replace('rilascio_veicolo.php') </script>";
                            } else {
                                //se non è andato a buon fine stampo un messaggiod i errore
                                echo "<script>alert('problema con la creazione della fattura, fattura per quest operazione gia esistente');</script>";
                            }
                        } else {
                            echo "<script>alert('Problema con il rilascio');</script>";
                        }
                    } else {
                        echo "<script>alert('Non hai selezionato nessuna targa.');</script>";
                    }
                }
                $conn->close();
                ?>
            </div>
        </div>


    </body>
</html>

</body>
</html>
