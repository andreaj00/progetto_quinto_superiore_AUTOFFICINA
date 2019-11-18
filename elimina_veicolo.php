<!DOCTYPE html>
<?php
session_start();
//controllo che sia loggato come amministratore
if (!isset($_SESSION['cliente'])) {
    //se non lo è lo mando al login
    header('Location: accessoCliente.php');
}
?>
<html>
    <title>Veicoli personali</title>
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

            <a href="privataCliente.php" class="w3-bar-item w3-button">Home</a>

            <a href="progresso.php" class="w3-bar-item w3-button">Stato veicoli</a>
            <a href="elimina_veicolo.php" class="w3-bar-item w3-button bottoneCliccato">Elimina veicolo</a>
            <a href="modifica_cliente.php" class="w3-bar-item w3-button">Modifica dati personali</a>
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
                $qry = "SELECT nome,cognome FROM cliente WHERE id_cliente='" . $_SESSION['id'] . "'";

                $result = $conn->query($qry);

                while ($row = $result->fetch_assoc()) {
                    echo "Cliente n°<span id='id'>" . $_SESSION['id'] . "</span>:<b> " . $row['nome'] . " " . $row['cognome'] . " </b>";
                }

                $conn->close();
                ?></span>
			<center>
            <div class="w3-container">
                <h1 style="text-align:center">Veicoli personali</h1><br>
                <?php
                $conn = connetti();
                $qry = "SELECT targa,marca.nome as 'marca', modello.nome as 'modello' "
                        . "FROM veicolo,cliente,marca,modello "
                        . "WHERE veicolo.fk_id_cliente=cliente.id_cliente AND veicolo.fk_id_modello=modello.id_modello "
                        . "AND modello.fk_id_marca=marca.id_marca AND cliente.id_cliente='" . $_SESSION['id'] . "'";
                $ris = $conn->query($qry);
                if ($ris->num_rows > 0) {
                    echo"<table align='center'><tr><th>Targa</th><th>Marca</th><th>Modello</th><th></th></tr>";
                    // popolamento tabella
                    while ($row = $ris->fetch_assoc()) {
                        echo "<tr>"
                        . "<td>" . $row['targa'] . "</td>"
                        . "<td>" . $row['marca'] . "</td>"
                        . "<td>" . $row['modello'] . "</td>"
                        . "<td><button value='" . $row['targa'] . "' class='bottone' onclick='controllaOperazioni(this)'>Elimina</button></td>"
                        . "</tr>";
                    }
                    echo"</table>";
                } else {
                    echo "<h3>NON HAI NESSUN VEICOLO REGISTRATO</h3>";
                }
                ?> 
            </div>
			</center>
        </div>

        <script>
            function controllaOperazioni(x) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        //uso il trim che elimina gli sazi e gli a capo
                        var risposta = this.responseText.trim();
                        var arrayRisposta = risposta.split("*£*");
                        //se non c'è nessuna risposta vuol dire che il veicolo non ha nessuna operazione
                        if (!arrayRisposta[1]) {
                            elimina(x);
                        } else {
                            alert("ATTENZIONE! il veicolo NON si può eliminare poichè è ancora in corso un'operazione presso l'autofficina");
                        }
                    }
                };
                var targa = x.value;
                //controllo se ci sono operazioni in corso (ovvero dove il cliente non ha ancora ritirato l'auto)
                var query = "SELECT operazione.id_operazione FROM veicolo,operazione WHERE operazione.fk_targa=veicolo.targa AND operazione.data_ritiro IS NULL AND veicolo.targa='" + targa + "'";

                xhttp.open("GET", "ricercaCombo.php?query=" + query + "&nColonne=" + 1, true);
                xhttp.send();
            }

            function elimina(x) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        //uso il trim che elimina gli sazi e gli a capo

                        var risposta = this.responseText.trim();
                        risposta = risposta.replace("Registrazione", "Eliminazione");
                        alert(risposta);
                        //ricarico al apgina
                        location.reload();
                    }
                };
                var targa = x.value;
                //controllo se ci sono operazioni in corso (ovvero dove il cliente non ha ancora ritirato l'auto)
                var query = "UPDATE veicolo SET fk_id_cliente='1' WHERE targa='" + x.value + "'";

                xhttp.open("GET", "inserimentoDB.php?query=" + query, true);
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

    </body>
</html>
