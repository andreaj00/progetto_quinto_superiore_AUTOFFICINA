<!DOCTYPE html>
<?php
session_start();
//controllo che sia loggato come amministratore
if (!isset($_SESSION['amministrazione'])) {
    //se non lo è lo mando al login
    header('Location: accessoAmministrazione.php');
}
// inclusione del file per la connessione
include "connessioneDB.php";
?>
<html>
    <title>Operazione</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="stili/stileBase.css">        
    <link rel="stylesheet" type="text/css" href="stili/stileAmministrazione.css">
    <link rel="stylesheet" type="text/css" href="stili/accordion.css">

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
                <a href="crea_modifica_operazione.php" class="w3-bar-item w3-button elementoAccordion ">Crea/Modifica operazione</a>
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
                // chiamata alla funzione di connessione
                $conn = connetti();
                $qry = "SELECT nome,cognome FROM amministrazione WHERE id_amministrazione='" . $_SESSION['id'] . "'";

                $result = $conn->query($qry);

                while ($row = $result->fetch_assoc()) {
                    echo "Utente n°<span id='id'>" . $_SESSION['id'] . "</span>:<b> " . $row['nome'] . " " . $row['cognome'] . " </b>";
                }

                $conn->close();
                ?></span>
            <center>
                <?php
                // chiamata alla funzione di connessione
                $conn = connetti();
                //stampo il titolo con il numero dellì'operazione

                echo "<h1 style='padding-left:15px'>OPERAZIONE N°<span id='id_operazione'>" . $_SESSION["id_operazione"];

                $query = "SELECT fk_targa,data_inizio,data_fine_prevista FROM operazione WHERE id_operazione='" . $_SESSION["id_operazione"] . "'";
                //eseguo la query
                $ris = $conn->query($query);
                //in teoria dovrebbe restituire solo una risposta, ma controllo lo stesso
                if ($ris->num_rows > 0) {
                    while ($riga = $ris->fetch_assoc()) {
                        //prendo le date e le converto nel formato g/m/a

                        $data_inizio = new DateTime($riga['data_inizio']);
                        $data_inizio = $data_inizio->format('d-m-Y H:i:s');
                        $data_fine_prevista = new DateTime($riga['data_fine_prevista']);
                        $data_fine_prevista = $data_fine_prevista->format('d-m-Y H:i:s');
                        //data inizio
                        echo "</span>-> Veicolo: " . $riga['fk_targa'] . "</h1><h4 align='right'><i>data inizio: " . $data_inizio . "</i>";
                        //data fine
                        echo "<br><i>data fine prevista: " . $data_fine_prevista . "</i></h6>";
                    }
                } else {
                    
                }

                $conn->close();
                ?>
                <div class="w3-container">
                    <button onclick="mostra(this)" class="bottone"><i class="fas fa-plus"></i>Aggiungi un intervento</button>


                    <div id="sezioneAggiungi" style="display:none">
                        <br>

                        <button class="accordion">SCEGLI INTERVENTO</button>
                        <div class="panel"  id="campointervento">
                            <table>
                                <tr><td>Tipo:
                                        <select onchange="cambioTipoIntervento(this)"> 
                                            <option value="-1"  selected> </option>
                                            <option value="lavoro su carrozzeria" >lavoro su carrozzeria</option>
                                            <option value="lavoro impianto elettrico">lavoro impianto elettrico</option>
                                            <option value="lavoro impianto meccanico">lavoro impianto meccanico</option>
                                            <option value="lavoro su interni" >lavoro su interni</option>
                                        </select>
                                    </td>
                                    <td style='width:33%'>
                                        <table>
                                            <tr>
                                                <td>nome:</td>
                                                <td><select id="id_anagrafica_intervento" style='width:100%' onchange="cambioNomeIntervento(this)"> 
                                                        <option value="-1" selected> </option>
                                                </td>
                                            </tr>
                                        </table>
                                        </select>
                                    </td>
                                    <td>
                                        <table>
                                            <tr><td>costo orario:€</td><td><input type='input' disabled></td></tr>
                                            <tr><td>tempo previsto(H):</td><td><input id="tempo_previsto_intervento" type='input' disabled></td></tr>
                                            <tr><td>sconto:</td><td><input type='input' disabled>%</td></tr>
                                            <tr><td>aliquota:</td><td><input type='input' disabled>%</td></tr>
                                            <tr><td>descrizione:</td><td><textarea disabled></textarea></td></tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>
                        </div>

                        <button class="accordion">SCEGLI PRODOTTO</button>
                        <div class="panel" id="divCampoProdotto">

                            <table id="campoProdotto">
                                <tr><td>categoria:
                                        <select onchange="cambioCategoriaProdotto(this)"> 
                                            <option value="-1" selected> </option>
                                            <?php
                                            // chiamata alla funzione di connessione
                                            $conn = connetti();
                                            // costruzione ed esecuzione query
                                            $qry = "SELECT * FROM categoria ORDER BY nome;";
                                            $result = $conn->query($qry);

                                            // popolamento casella combinata
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<OPTION value = '" . $row['id_categoria'] . "'>" . $row['nome'] . "</OPTION>";
                                            }
                                            $conn->close();
                                            ?>
                                        </select>
                                    </td>
                                    <td style='width:33%'>
                                        <table>
                                            <tr>
                                                <td>nome:</td>
                                                <td><select class="id_prodotto" style='width:100%' onchange="cambioNomeProdotto(this)"> 
                                                        <option value="-1" selected> </option>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>quantità:</td>
                                                <td><input type="number" class="quantita_prodotto" min="1" max="100" value="1" required> 
                                                </td>
                                            </tr>
                                        </table>
                                        </select>
                                    </td>
                                    <td>
                                        <table>
                                            <tr><td>costo:€</td><td><input type='input' disabled></td></tr>
                                            <tr><td>sconto:</td><td><input type='input' disabled>%</td></tr>
                                            <tr><td>aliquota:</td><td><input type='input' disabled>%</td></tr>
                                            <tr><td>descrizione:</td><td><textarea disabled></textarea></td></tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>
                            <button onclick="aggiungiCampoProdotto(this)" class="bottone"><i class="fas fa-plus"></i>Aggiungi un'altro campo prodotto</button>
                        </div>

                        <!-- LO SMALTIMENTO NON é OBBLIGATORIO-->
                        <button class="accordion">SCEGLI SMALTIMENTO</button>
                        <div class="panel" id="divCampoSmaltimento">
                            <table id="campoSmaltimento">
                                <tr><td>tipo:
                                        <select onchange="cambioTipoSmaltimento(this)"> 
                                            <option value="-1" selected> </option>
                                            <option value="batteria" >batteria</option>
                                            <option value="liquido">liquido</option>
                                            <option value="ricambi">ricambi</option>
                                            <option value="filtri" >filtri</option>
                                            <option value="utensili" >utensili</option>
                                        </select>
                                    </td>
                                    <td style='width:33%'>
                                        <table>
                                            <tr>
                                                <td>nome:</td>
                                                <td><select class="id_smaltimento" style='width:100%' onchange="cambioNomeSmaltimento(this)"> 
                                                        <option value="-1" selected> </option>
                                                </td>
                                            </tr>
                                        </table>
                                        </select>
                                    </td>
                                    <td>
                                        <table>
                                            <tr><td>costo:€</td><td><input type='input' disabled></td></tr>
                                            <tr><td>descrizione:</td><td><textarea disabled></textarea></td></tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <button onclick="aggiungiCampoSmaltimento(this)"  class="bottone"><i class="fas fa-plus"></i>Aggiungi un'altro campo smaltimento</button>

                        </div>

                        <button class="accordion">SCEGLI MECCANICO</button>

                        <div class="panel" id="divCampoMeccanico">

                            <table id="campoMeccanico">
                                <tr><td>meccanico:
                                        <select  class="id_meccanico"> 
                                            <option value="-1" selected> </option>
                                            <?php
                                            // chiamata alla funzione di connessione
                                            $conn = connetti();
                                            // costruzione ed esecuzione query
                                            $qry = "SELECT id_meccanico,cognome,nome FROM meccanico WHERE licenziato='no' ORDER BY cognome,nome;";
                                            $result = $conn->query($qry);

                                            // popolamento casella combinata
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<OPTION value = '" . $row['id_meccanico'] . "'>" . $row['cognome'] . "-" . $row['nome'] . "</OPTION>";
                                            }
                                            $conn->close();
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <button onclick="aggiungiCampoMeccanico(this)" class="bottone"><i class="fas fa-plus"></i>Aggiungi un'altro campo meccanico</button>
                        </div>
                        <textarea id="note_aggiuntive" style="width:100%;margin-top:10px" placeholder="Inserisci eventuali noti aggiungtive"></textarea>
                        <button onclick="creaNuovoIntervento()" style="margin-left:80%; margin-top:10px" class="bottone"><i class="fas fa-plus"></i> Crea questo nuovo intervento</button>




                        <!--dato che l'ajax non puo restituire un valore lo scrivo qua e poi lo cancello  -->
                        <span id="ajax"></span>
                        <span id="ajax2"></span>
                    </div>


                    <!--elenco degli interventi in corso -->
                    <?php
                    // chiamata alla funzione di connessione
                    $conn = connetti();
                    // costruzione ed esecuzione query
                    $qry = "SELECT id_intervento,nome,descrizione,note_aggiuntive,stato FROM operazione,comporre,intervento,anagrafica_intervento"
                            . " WHERE operazione.id_operazione=comporre.fk_id_operazione AND comporre.fk_id_intervento=intervento.id_intervento "
                            . " AND intervento.fk_id_anagrafica_intervento=anagrafica_intervento.id_anagrafica_intervento AND operazione.id_operazione='" . $_SESSION["id_operazione"] . "'ORDER BY nome;";
                    $ris = $conn->query($qry);
                    // vedo se ci sono degli interventi
                    if ($ris->num_rows > 0) {
                        echo "<table align='center' style='margin-top:10px;width:100%;text-align:center;border:2px solid;border-collapse: collapse;'>"
                        . "<tr  class='border_bottom'><th>Nome</th><th>Descrizione</th><th>Note Aggiuntive</th><th>Stato</th></tr>";
                        while ($row = $ris->fetch_assoc()) {
                            echo "<tr class='border_bottom'><td>" . $row['nome'] . " </td>";
                            echo "<td>" . $row['descrizione'] . " </td>";
                            echo "<td>" . $row['note_aggiuntive'] . " </td>";
                            echo "<td><select onchange='cambiaStato(this)'>";
                            //in base allo stao cambio il selected
                            //i valori degli option sono es 1*£*in attesa dove 1 è l'id dellintervento
                            switch ($row['stato']) {
                                case "in attesa":
                                    echo "<option value='" . $row['id_intervento'] . "*£*in attesa' selected>in attesa</option>";
                                    echo "<option value='" . $row['id_intervento'] . "*£*in esecuzione'>in esecuzione</option>";
                                    echo "<option value='" . $row['id_intervento'] . "*£*finito'>finito</option>";

                                    break;
                                case "in esecuzione":
                                    echo "<option value='" . $row['id_intervento'] . "*£*in attesa'>in attesa</option>";
                                    echo "<option value='" . $row['id_intervento'] . "*£*in esecuzione' selected>in esecuzione</option>";
                                    echo "<option value='" . $row['id_intervento'] . "*£*finito'>finito</option>";

                                    break;
                                case "finito":
                                    echo "<option value='" . $row['id_intervento'] . "*£*in attesa'>in attesa</option>";
                                    echo "<option value='" . $row['id_intervento'] . "*£*in esecuzione'>in esecuzione</option>";
                                    echo "<option value='" . $row['id_intervento'] . "*£*finito' selected>finito</option>";

                                    break;
                                //non ho nessun default
                                default:
                            }
                            echo "</select></td>";

                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        //Se non ci sono
                        echo "<h2 align='center'>NON CI SONO INTERVENTI</h2>";
                    }
                    $conn->close();
                    ?>
                </div>
            </center>
        </div>

        <script>

            //gestisco gli accordion
            var acc = document.getElementsByClassName("accordion");
            var id_operazione = document.getElementById("id_operazione").innerHTML;
            var cloneCampoProdotto = document.getElementById("campoProdotto").cloneNode(true);
            var cloneCampoSmaltimento = document.getElementById("campoSmaltimento").cloneNode(true);
            var cloneCampoMeccanico = document.getElementById("campoMeccanico").cloneNode(true);


            for (var i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function () {
                    this.classList.toggle("active"); //aggiungo la classe active (cambia l'icona con la freccia in su)
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                        panel.style.paddingTop = null;
                        panel.style.paddingBottom = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                        panel.style.paddingTop = "10px";
                        panel.style.paddingBottom = "10px";
                    }
                });
            }

            function mostra(x) {
                document.getElementById("sezioneAggiungi").style.display = "block";
                x.style.display = "none";
            }

            function cambioTipoIntervento(x) {
                var tipo = x.value;
                var query = "SELECT id_anagrafica_intervento,nome FROM anagrafica_intervento a"+
                        " WHERE tipo='" + tipo + "' AND id_anagrafica_intervento NOT IN "+
                            "(SELECT id_anagrafica_intervento FROM anagrafica_intervento a2,intervento,comporre "+
                            "WHERE a2.id_anagrafica_intervento=intervento.fk_id_anagrafica_intervento AND intervento.id_intervento=comporre.fk_id_intervento AND comporre.fk_id_operazione='" + id_operazione + "')";
                var nColonne = 2;
                //eseguo la query
                loadDoc(query, nColonne);
                var risposta = document.getElementById("ajax").innerHTML;
                document.getElementById("ajax").innerHTML = "";

                var arrayRisposta = risposta.split("*£*");

                var selectNome = x.parentNode.nextElementSibling.children[0].children[0].children[0].children[1].children[0];

                //canello i valori vecchi
                selectNome.innerHTML = "<option value='-1' required> </option>";
                cambioNomeIntervento(selectNome);
                //creo option quanti sono gli elementi
                //vado di 2 in 2
                //parto da 1 poichè la prima posizione è vuota
                for (var i = 1; i < arrayRisposta.length; i = i + 2) {
                    var option = document.createElement("OPTION");
                    option.value = arrayRisposta[i];//id_anagrafica_intervento
                    option.innerHTML = arrayRisposta[i + 1];//nome anagrafica_intervento

                    selectNome.appendChild(option);
                }

            }

            function cambioNomeIntervento(x) {
                var id = x.value;
                var query = "SELECT costo_orario,tempo_previsto,percentuale_sconto,aliquota_da_aggiungere,descrizione FROM anagrafica_intervento WHERE id_anagrafica_intervento='" + id + "'"
                var nColonne = 5;
                //eseguo la query
                loadDoc(query, nColonne);
                var risposta = document.getElementById("ajax").innerHTML;
                document.getElementById("ajax").innerHTML = "";

                var arrayRisposta = risposta.split("*£*");

                //input costo orario
                x.parentNode.parentNode.parentNode.parentNode.parentNode.nextElementSibling.children[0].children[0].children[0].children[1].children[0].value = arrayRisposta[1];
                //input tempo previsto
                x.parentNode.parentNode.parentNode.parentNode.parentNode.nextElementSibling.children[0].children[0].children[1].children[1].children[0].value = arrayRisposta[2];
                //input scosto
                x.parentNode.parentNode.parentNode.parentNode.parentNode.nextElementSibling.children[0].children[0].children[2].children[1].children[0].value = arrayRisposta[3];
                //input aliquota
                x.parentNode.parentNode.parentNode.parentNode.parentNode.nextElementSibling.children[0].children[0].children[3].children[1].children[0].value = arrayRisposta[4];
                //input descrizione
                x.parentNode.parentNode.parentNode.parentNode.parentNode.nextElementSibling.children[0].children[0].children[4].children[1].children[0].value = arrayRisposta[5];


            }

            function cambioCategoriaProdotto(x) {

                var fk_id_categoria = x.value;
                var query = "SELECT id_prodotto,nome FROM prodotto WHERE fk_id_categoria='" + fk_id_categoria + "'";
                var nColonne = 2;
                //eseguo la query
                loadDoc(query, nColonne);
                var risposta = document.getElementById("ajax").innerHTML;
                document.getElementById("ajax").innerHTML = "";

                var arrayRisposta = risposta.split("*£*");

                var selectNome = x.parentNode.nextElementSibling.children[0].children[0].children[0].children[1].children[0];
                //cancello i valori vecchi
                selectNome.innerHTML = "<option value='-1' required> </option>";
                cambioNomeProdotto(selectNome);
                //creo option quanti sono gli elementi
                //vado di 2 in 2
                //parto da 1 poichè la prima posizione è vuota
                for (var i = 1; i < arrayRisposta.length; i = i + 2) {
                    var option = document.createElement("OPTION");
                    option.value = arrayRisposta[i];//id_prodtto
                    option.innerHTML = arrayRisposta[i + 1];//nome prodotto

                    selectNome.appendChild(option);
                }

            }

            function cambioNomeProdotto(x) {
                var id = x.value;
                var query = "SELECT costo,percentuale_sconto,aliquota_da_aggiungere,descrizione FROM prodotto WHERE id_prodotto='" + id + "'"
                var nColonne = 4;
                //eseguo la query
                loadDoc(query, nColonne);
                var risposta = document.getElementById("ajax").innerHTML;
                document.getElementById("ajax").innerHTML = "";

                var arrayRisposta = risposta.split("*£*");
                //input costo orario
                x.parentNode.parentNode.parentNode.parentNode.parentNode.nextElementSibling.children[0].children[0].children[0].children[1].children[0].value = arrayRisposta[1];
                //input tempo prevsto
                x.parentNode.parentNode.parentNode.parentNode.parentNode.nextElementSibling.children[0].children[0].children[1].children[1].children[0].value = arrayRisposta[2];
                //input scosto
                x.parentNode.parentNode.parentNode.parentNode.parentNode.nextElementSibling.children[0].children[0].children[2].children[1].children[0].value = arrayRisposta[3];
                //input aliquota
                x.parentNode.parentNode.parentNode.parentNode.parentNode.nextElementSibling.children[0].children[0].children[3].children[1].children[0].value = arrayRisposta[4];


            }


            function cambioTipoSmaltimento(x) {

                var tipo = x.value;
                var query = "SELECT id_smaltimento,nome FROM smaltimento WHERE tipo='" + tipo + "'";
                var nColonne = 2;
                //eseguo la query
                loadDoc(query, nColonne);
                var risposta = document.getElementById("ajax").innerHTML;
                document.getElementById("ajax").innerHTML = "";

                var arrayRisposta = risposta.split("*£*");

                var selectNome = x.parentNode.nextElementSibling.children[0].children[0].children[0].children[1].children[0];
                //alert(selectNome.nodeName)
                //cancello i valori vecchi
                selectNome.innerHTML = "<option value='-1' required> </option>";
                cambioNomeSmaltimento(selectNome);
                //creo option quanti sono gli elementi
                //vado di 2 in 2
                //parto da 1 poichè la prima posizione è vuota
                for (var i = 1; i < arrayRisposta.length; i = i + 2) {
                    var option = document.createElement("OPTION");
                    option.value = arrayRisposta[i];//id_prodtto
                    option.innerHTML = arrayRisposta[i + 1];//nome prodotto

                    selectNome.appendChild(option);
                }

            }

            function cambioNomeSmaltimento(x) {
                var id = x.value;
                var query = "SELECT costo,descrizione FROM smaltimento WHERE id_smaltimento='" + id + "'"
                var nColonne = 2;
                //eseguo la query
                loadDoc(query, nColonne);
                var risposta = document.getElementById("ajax").innerHTML;
                document.getElementById("ajax").innerHTML = "";

                var arrayRisposta = risposta.split("*£*");
                //input costo orario
                x.parentNode.parentNode.parentNode.parentNode.parentNode.nextElementSibling.children[0].children[0].children[0].children[1].children[0].value = arrayRisposta[1];
                //input tempo prevsto
                x.parentNode.parentNode.parentNode.parentNode.parentNode.nextElementSibling.children[0].children[0].children[1].children[1].children[0].value = arrayRisposta[2];


            }

            function aggiungiCampoProdotto(x) {
                var clone = cloneCampoProdotto.cloneNode(true);
                var div = document.getElementById("divCampoProdotto");
                aggiungiCampo(x, clone, div);
            }

            function aggiungiCampoSmaltimento(x) {
                var clone = cloneCampoSmaltimento.cloneNode(true);
                var div = document.getElementById("divCampoSmaltimento");
                aggiungiCampo(x, clone, div);

            }

            function aggiungiCampo(x, cloneCampo, div) {

                var clone = cloneCampo.cloneNode(true);

                //aggiungo il bottone per cancellare il nuovo campo
                var tbody = clone.children[0].children[0].children[2].children[0].children[0];
                var tr = document.createElement("TR");
                var td = document.createElement("TD");
                td.colSpan = "2";
                td.style.textAlign = "center";
                var bottone = document.createElement("BUTTON");
                //aggiungo l'evento che ermette di eliminare il nodo
                bottone.addEventListener("click", function () {
                    x.parentNode.removeChild(clone);
                });
                var icona = document.createElement("i");//icona

                icona.className = "fas fa-times";
                bottone.innerHTML = "elimina questo campo ";
                bottone.appendChild(icona);
                bottone.classList.add("bottone");
                td.appendChild(bottone);
                tr.appendChild(td);
                tbody.appendChild(tr);

                //clono il nodo
                x.parentNode.insertBefore(clone, x);

                //simulo il click del bottone 2 volte
                div.previousElementSibling.click();
                div.previousElementSibling.click();
            }

            function aggiungiCampoMeccanico(x) {
                var clone = cloneCampoMeccanico.cloneNode(true);
                var div = document.getElementById("divCampoMeccanico");

                //aggiungo il bottone per cancellare il nuovo campo
                var tr = clone.children[0].children[0];
                var td = document.createElement("TD");
                td.style.textAlign = "center";
                var bottone = document.createElement("BUTTON");
                //aggiungo l'evento che ermette di eliminare il nodo
                bottone.addEventListener("click", function () {
                    x.parentNode.removeChild(clone);
                });
                var icona = document.createElement("i");//icona

                icona.className = "fa fa-times";
                bottone.innerHTML = "elimina questo campo ";
                bottone.classList.add("bottone");
                bottone.appendChild(icona);
                td.appendChild(bottone);
                tr.appendChild(td);

                //clono il nodo
                x.parentNode.insertBefore(clone, x);

                //simulo il click del bottone 2 volte
                div.previousElementSibling.click();
                div.previousElementSibling.click();

            }


            function loadDoc(query, nColonne) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        //uso il trim che elimina gli sazi e gli a capo
                        document.getElementById("ajax").innerHTML = this.responseText.trim();
                    }
                };

                xhttp.open("GET", "ricercaCombo.php?query=" + query + "&nColonne=" + nColonne, false);
                xhttp.send();
            }



            function creaNuovoIntervento() {
                var utilita = true;
                var array = [];//array per salvare i valori
                //acquisizione dati e vari controlli(i controlli li faccio adesso e non durante gli insert poichè altrimenti sarebbe più complicato eliminare gli di gia inseriti nel frattempo)
                var id_anagrafica_intervento = document.getElementById("id_anagrafica_intervento").value;

                if (id_anagrafica_intervento != "-1") {
                    var note_aggiuntive = document.getElementById("note_aggiuntive").value;
                    var array_id_prodotto = document.getElementsByClassName("id_prodotto"); //possibile array

                    //controllo che tutti i select siano stai selezionati e che non siano uguali
                    for (var i = 0; i < array_id_prodotto.length && utilita; i++) {
                        //controllo che un valore non sia gia inserito negli altri campi
                        for (var j = 0; j < i && utilita; j++) {
                            if (array_id_prodotto[i].value == array[j]) {
                                output_compila = "i PRODOTTI selezionati devono essere diversi fra i vari campi, oppure elimina i campi dove sono ripetuti";
                                utilita = false;
                            }
                        }
                        //se nessun valore è compiato, lo salvo nell'array temporaneo
                        if (utilita) {
                            array[i] = array_id_prodotto[i].value;
                        }
                        //controllo che abbia un valore valido e non quello di default
                        if (array_id_prodotto[i].value == "-1") {
                            output_compila = "seleziona in tutti i campi di PRODOTTO, un PRODOTTO, oppure elimina i campi che non utilizzi";
                            utilita = false;
                        }
                    }

                    var quantita_prodotto_stringa = document.getElementsByClassName("quantita_prodotto"); //possibile array
                    var quantita_prodotto = [];
                    //controllo che tutti le quantita prodotto siano maggiori di 0 
                    for (var i = 0; i < quantita_prodotto_stringa.length && utilita; i++) {

                        //controllo che abbia un valore valido maggiore di 0
                        quantita_prodotto[i] = Math.trunc(parseInt(quantita_prodotto_stringa[i].value));//lo converto in un integer

                        if (quantita_prodotto[i] <= 0) {
                            output_compila = "le QUANTITA nei prodotti devono essere maggiori di 0";
                            utilita = false;
                        }
                    }

                    //controllo che tutti i select siano stai selezionati e che non siano uguali
                    var id_smaltimento = document.getElementsByClassName("id_smaltimento"); //possibile array
                    array = [];//azzero l'array
                    //controllo che tutti i select siano stai selezionati
                    for (var i = 0; i < id_smaltimento.length && utilita; i++) {
                        //controllo che un valore non sia gia inserito negli altri campi

                        for (var j = 0; j < i && utilita; j++) {
                            if (id_smaltimento[i].value == array[j]) {
                                output_compila = "gli SMALTIMENTI selezionati devono essere diversi fra i vari campi, oppure elimina i campi dove sono ripetuti";
                                utilita = false;
                            }
                        }
                        //se nessun valore è compiato, lo salvo nell'array temporaneo
                        if (utilita) {
                            array[i] = id_smaltimento[i].value;
                        }
                    }
                    //controllo che tutti i select siano stai selezionati e che non siano uguali
                    var id_meccanico = document.getElementsByClassName("id_meccanico"); //possibile array
                    array = [];//azzero l'array
                    //controllo che tutti i select siano stai selezionati
                    for (var i = 0; i < id_meccanico.length && utilita; i++) {
                        //controllo che un valore non sia gia inserito negli altri campi
                        for (var j = 0; j < i && utilita; j++) {
                            if (id_meccanico[i].value == array[j]) {
                                output_compila = "i MECCANICi selezionati devono essere diversi fra i vari campi, oppure elimina i campi dove sono ripetuti";
                                utilita = false;
                            }
                        }
                        //se nessun valore è compiato, lo salvo nell'array temporaneo
                        if (utilita) {
                            array[i] = id_meccanico[i].value;
                        }
                        //controllo che abbia un valore valido e non quello di default
                        if (id_meccanico[i].value == "-1") {
                            output_compila = "seleziona in tutti i campi di MECCANICO, un MECCANICO, oppure elimina i campi che non utilizzi";
                            utilita = false;
                        }
                    }

                    //se ha compilato correttamente tutti i campi
                    if (utilita) {
                        //inserisco il nuovo intervento
                        var query = "INSERT INTO intervento (note_aggiuntive,fk_id_anagrafica_intervento) VALUES ('" + note_aggiuntive + "','" + id_anagrafica_intervento + "')"
                        inserimentoIntervento(query);
                        //prendo l'id dell'intervento inserito
                        var id_intervento = document.getElementById("ajax2").innerHTML;
                        document.getElementById("ajax2").innerHTML = "";
                        //inserisco tutti i vari collegamenti a prodotto,smaltimento e meccanico e operazione
                        //collegamento tra prodotto e intervento (utilizzare)
                        for (var i = 0; i < array_id_prodotto.length && utilita; i++) {
                            query = "INSERT INTO utilizzare (fk_id_intervento,fk_id_prodotto,quantita) VALUES ('" + id_intervento + "','" + array_id_prodotto[i].value + "','" + quantita_prodotto[i] + "')";
                            inserimentoAssociazioni(query);
                        }
                        //collego intervento e smaltimento
                        for (var i = 0; i < id_smaltimento.length && utilita; i++) {
                            //Controllo che non sia vuoto
                            if (id_smaltimento[i].value != "-1") {
                                query = "INSERT INTO comportare (fk_id_intervento,fk_id_smaltimento) VALUES ('" + id_intervento + "','" + id_smaltimento[i].value + "')";
                                inserimentoAssociazioni(query);
                            }
                        }
                        //collego intervento e meccanico
                        for (var i = 0; i < id_meccanico.length && utilita; i++) {
                            query = "INSERT INTO svolgere (fk_id_intervento,fk_id_meccanico) VALUES ('" + id_intervento + "','" + id_meccanico[i].value + "')";
                            inserimentoAssociazioni(query);

                        }
                        //collego intervento e operazione
                        query = "INSERT INTO comporre (fk_id_intervento,fk_id_operazione) VALUES ('" + id_intervento + "','" + id_operazione + "')";
                        inserimentoAssociazioni(query);

                        //aggiorno la data fine prevista
                        var query = "SELECT data_fine_prevista FROM operazione WHERE id_operazione='" + id_operazione + "'";
                        loadDoc(query, 1);
                        var risposta = document.getElementById("ajax").innerHTML;
                        document.getElementById("ajax").innerHTML = "";

                        var arrayRisposta = risposta.split("*£*")[1];
                        //prendo la data fine prevista
                        var data_fine_prevista = new Date(arrayRisposta);
                        //prendo il tempo del nuovo intervento
                        var ore_intervento = document.getElementById("tempo_previsto_intervento").value;
                        var minuti_intervento = Math.trunc(ore_intervento * 60 - (Math.trunc(ore_intervento * 60 / 100) * 100));
                        var secondi_intervento = Math.trunc(ore_intervento * 3600 - (Math.trunc(ore_intervento * 3600 / 100) * 100));
                        ore_intervento = Math.trunc(ore_intervento);
                        //setto la nuova ora
                        data_fine_prevista.setHours(data_fine_prevista.getHours() + ore_intervento, data_fine_prevista.getMinutes() + minuti_intervento, data_fine_prevista.getSeconds() + secondi_intervento);

                        data_fine_prevista = (data_fine_prevista.getFullYear()).toString() + "-" + ((data_fine_prevista.getMonth() + 1)).toString() + "-" + (data_fine_prevista.getDate()).toString() + " " + (data_fine_prevista.getHours()).toString() + ":" + (data_fine_prevista.getMinutes()).toString() + ":" + (data_fine_prevista.getSeconds()).toString();

                        var nuova_data = data_fine_prevista;//aggiorno la data
                        var query = "UPDATE operazione SET data_fine_prevista='" + nuova_data + "' , data_fine_effettiva=NULL  WHERE id_operazione='" + id_operazione + "'";

                        inserimentoAssociazioni(query, 1);

                        //stampo la buona riuscita
                        alert("il nuovo intervento e come è formato, è stato registrato");

                        //ricarico la paigna
                        location.reload();
                    } else {
                        alert(output_compila);
                    }
                } else {
                    alert("inserisci l'INTERVENTO");
                }
            }


            function inserimentoIntervento(query) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        //uso il trim che elimina gli sazi e gli a capo
                        var risposta = this.responseText.trim();
                        var id_intervento = risposta.split("*£*")[1];
                        var risposta = risposta.split("*£*")[0];
                        //se la risposta non è andata bene stampo il messaggio di errore
                        if (risposta != "Registrazione effettuata correttamente") {
                            alert(risposta);
                        } else {
                            //resituisco i valori
                            //nella resituzione faccio 
                            document.getElementById("ajax2").innerHTML = "" + id_intervento;
                        }

                    }
                };

                //invio la query
                xhttp.open("GET", "inserimentoDBPerIntervento.php?query=" + query, false);
                xhttp.send();
            }


            function inserimentoAssociazioni(query) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        //uso il trim che elimina gli sazi e gli a capo
                        var risposta = this.responseText.trim();
                        //se la risposta non è andata bene stampo il messaggio di errore
                        if (risposta != "Registrazione effettuata correttamente.") {
                            alert(risposta);//se arriva un errore il db perde di consistenza
                        } else {
                            //se è andato a buon fine non stampo niente
                        }
                    }
                };
                xhttp.open("GET", "inserimentoDB.php?query=" + query, true);
                xhttp.send();
            }


            function cambiaStato(x) {
                var valore = x.value;
                valore = valore.split("*£*");
                var id_intervento = valore[0];
                var stato = valore[1];
                var finito = true;

                //aggiorno la data
                var query = "UPDATE intervento SET stato='" + stato + "' WHERE id_intervento='" + id_intervento + "'";
                inserimentoAssociazioni(query, 1);

                alert('stato cambiato con successo');

                //controllo se tutti gli interventi sono finiti
                //faccio un controllo che quello che abbia modificato sia finito ,altrimenti faccio un controllo inutile a prescindere

                if (stato == "finito") {
                    query = "SELECT stato FROM operazione,comporre,intervento WHERE operazione.id_operazione=comporre.fk_id_operazione AND comporre.fk_id_intervento=intervento.id_intervento AND operazione.id_operazione='" + id_operazione + "'";
                    loadDoc(query, 1);


                    var risposta = document.getElementById("ajax").innerHTML;
                    document.getElementById("ajax").innerHTML = "";

                    var arrayRisposta = risposta.split("*£*");
                    //inizio da 1 poichè in loaddoc che richiama ricercaComobo.php che restituisce la serie di risopste con *£* come divisore ma iniziando con questo
                    for (var i = 1; i < arrayRisposta.length; i++) {
                        if (arrayRisposta[i] != "finito") {
                            //se qualche intervento non è finito non faccio niente
                            finito = false;
                        }
                    }
                    //se invece tutti gli interventi sono finiti
                    if (finito) {
                        var query = "UPDATE operazione SET data_fine_effettiva=NOW() WHERE id_operazione='" + id_operazione + "'";
                        inserimentoAssociazioni(query, 1);
                        alert("complimenti hai finito tutti gli interventi di questa operazione")
                    }
                }
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

    </body>
</html>
