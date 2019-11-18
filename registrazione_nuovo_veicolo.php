<!DOCTYPE html>
<?php 
session_start();
//controllo che sia loggato come amministratore
if(!isset($_SESSION['amministrazione'])){
    //se non lo è lo mando al login
    header('Location: accessoAmministrazione.php');
}
?>
<html>
    <title>Registrazione nuovo veicolo</title>
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
                <a href="registrazione_nuovo_veicolo.php" class="w3-bar-item w3-button elementoAccordion  bottoneCliccato">Registrazione nuovo veicolo</a>
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
			<center>
            <div class="w3-container">
                <h1 style="text-align: center;">Registrazione veicolo</h1>
                <form action="" method="POST">
                    <p>Inserire codice fiscale cliente<span style="color: #990000;">*</span>:
                        <input type="text" name="codF" maxlength="16" required></p>
                    <p>Inserire targa Veicolo<span style="color: #990000;">*</span>:
                        <input type="text" name="targa" maxlength="7" required></p>
                    <p>Inserire marca Veicolo:
                        <select name="marca" id="marca" onchange="loadDoc()">
                            <option>Inserire marca</option>
                            <?php
                            $conn = connetti();

                            $qry = "SELECT nome FROM marca";
                            $ris = $conn->query($qry);
                            while ($row = $ris->fetch_assoc()) {
                                echo "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
                            }
                            ?>
                        </select></p>
                    <p>Inserire modello Veicolo:
                        <select name="modello" id="modello">
                            <option> </option>
                        </select></p>
                    <br>
                    <input type="submit" value="Inserisci" class="bottone">
                </form>
            </div>
			</center>
        </div>

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
            function loadDoc() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        //uso il trim che elimina gli sazi e gli a capo
                        var risposta = this.responseText.trim();
                        var arrayRisposta = risposta.split("*£*");

                        var selectModello = document.getElementById("modello");
                        //canello i valori vecchi
                        selectModello.innerHTML = "<option value='-1' required> </option>";
                        //creo option quanti sono gli elementi
                        ////vado di 2 a 2
                        //parto da 1 poichè la prima posizione è vuota
                        for (var i = 1; i < arrayRisposta.length; i = i + 2) {
                            var option = document.createElement("OPTION");
                            option.value = arrayRisposta[i + 1];//id_anagrafica_intervento
                            option.innerHTML = arrayRisposta[i];//nome anagrafica_intervento

                            selectModello.appendChild(option);
                        }
                    }
                };
                var marca = document.getElementById("marca").value;
                var query = "SELECT modello.nome,modello.id_modello FROM modello join marca on fk_id_marca=id_marca WHERE marca.nome='" + marca + "'";

                xhttp.open("GET", "ricercaCombo.php?query=" + query + "&nColonne=" + 2, true);
                xhttp.send();
            }
        </script>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $codF = strtoupper($_POST['codF']);
            $targa = strtoupper($_POST['targa']);
            $modello = $_POST['modello'];

            $qry = "SELECT * FROM cliente WHERE codice_fiscale='$codF'";
            $ris = $conn->query($qry);
            if ($ris->num_rows > 0) {
                while ($row = $ris->fetch_assoc()) {
                    $id = $row['id_cliente'];
                }
                $qry = "INSERT INTO veicolo (targa,fk_id_cliente,fk_id_modello) VALUES ('$targa', '$id','$modello')";
                if ($conn->query($qry)) {
                    echo "<script>alert('Veicolo registrato con successo.');</script>";
                    //erindirizzo alal home per evitare eventuali problemi con la ricarica di pagina, non uso header perchè mi da errore dato che ho gia stampato qualcosa
                    echo "<script> window.location.replace('registrazione_nuovo_veicolo.php') </script>";
                } else {
                    echo "<script>alert('Registrazione non riuscita');</script>";
                }
            } else {
                echo "<script>alert('Cliente non registrato.');</script>";
            }
        }
        $conn->close();
        ?>
    </body>
</html>
