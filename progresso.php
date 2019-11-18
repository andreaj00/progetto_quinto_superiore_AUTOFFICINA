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
    <title>Progresso operazioni sui veicoli</title>
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

            <a href="privataCliente.php" class="w3-bar-item w3-button ">Home</a>

            <a href="progresso.php" class="w3-bar-item w3-button bottoneCliccato">Stato veicoli</a>
            <a href="elimina_veicolo.php" class="w3-bar-item w3-button">Elimina veicolo</a>
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
                <h1 style="text-align: center;">Progresso operazioni sui veicoli</h1>
                <table align="center" cellpadding="10" class="table">
                    <?php
                    // chiamata alla funzione di connessione
                    $conn = connetti();

                    // costruzione ed esecuzione query
                    //cerco le targhe del cliente
                    $qry = "SELECT * FROM veicolo WHERE fk_id_cliente='" . $_SESSION['id'] . "' ORDER BY targa";
                    $result = $conn->query($qry);
                    if ($result->num_rows > 0) {
                        echo "<tr><th>Targa</th><th>Data inizio</th><th>Data fine</th><th>Stato</th></tr>";
                        //per ogni targa
                        while ($row = $result->fetch_assoc()) {
                            $t = $row['targa'];
                            //cerco le operazioni in corso che coinvolgo le varie targhe
                            $qry = "SELECT o.* FROM operazione o, veicolo v WHERE o.fk_targa=v.targa AND o.fk_targa='$t' AND data_ritiro IS NULL ORDER BY o.fk_targa";
                            $result2 = $conn->query($qry);
                            if ($result2->num_rows > 0) {
                                //dovrei avere solo un'operazione in corso
                                while ($row2 = $result2->fetch_assoc()) {

                                    //cerco il numero di interventi che compongono l'operazione
                                    $qry = "SELECT count(*) AS n FROM operazione,comporre WHERE id_operazione=fk_id_operazione AND id_operazione='" . $row2['id_operazione'] . "'";
                                    $ris = $conn->query($qry);
                                    //dovrei averes olo un risultato
                                    while ($riga = $ris->fetch_assoc()) {
                                        $n_interventi = $riga['n'];
                                    }
                                    //prendo gli stati dei vari interventi
                                    $qry = "SELECT nome,stato FROM operazione,comporre,intervento,anagrafica_intervento "
                                            . " WHERE operazione.id_operazione=comporre.fk_id_operazione AND comporre.fk_id_intervento=intervento.id_intervento "
                                            . " AND anagrafica_intervento.id_anagrafica_intervento=intervento.fk_id_anagrafica_intervento "
                                            . " AND operazione.id_operazione='" . $row2['id_operazione'] . "' ORDER BY nome";
                                    $ris = $conn->query($qry);
                                    $title = "";
                                    $perc = 0; //percentuale avazamento
                                    while ($riga = $ris->fetch_assoc()) {
                                        //creo la stringa che mettero nel title
                                        $title .= $riga['nome'] . " -> " . $riga['stato'] . " &#x0A ";
                                        switch ($riga['stato']) {
                                            case "in attesa":
                                                $perc += 100 / $n_interventi * 0;
                                                break;
                                            case "in esecuzione":
                                                $perc += 100 / $n_interventi * 0.5;
                                                break;
                                            case "finito":
                                                $perc += 100 / $n_interventi * 1;
                                                break;
                                            //nessun default
                                            default:
                                        }
                                    }
                                    $perc = round($perc);
                                    echo "<tr><td>" . $row2['fk_targa'] . "</td>"
                                    . "<td>" . $row2['data_inizio'] . "</td>"
                                    . "<td>" . $row2['data_fine_prevista'] . "</td>"
                                    . "<td width='50%;'>"
                                    //barra di stato
                                    . "<div  title='" . $title . "' style='width: 100%;height:100%; background-color: #666666; border-radius: 25px;'>"//#666666 grigio chiaro
                                    . "<div id='myBar' style='width: $perc%;height: 30px; border-radius: 25px;background-color: #404040; overflow-x: visible ; text-align: center; line-height: 30px; color: #cc8800;'>" . $perc . " %</div>"//#cc8800 bedge #404040 grigio scuro
                                    . "</div>"
                                    . "</td>"
                                    . "</tr>";
                                }
                            } else {
                                //stampo che quella amcchian non ha enssuna operaione in corso
                                echo "<tr><td>" . $t . "</td>"
                                . "<td colspan='3' style='text-align:center;font-style: italic;'>nessuna operazione in corso</td>"
                                . "</tr>";
                            }
                            echo "<br>";
                        }
                    } else {
                        echo "<h3 style='text-align:center'>Nessun veicolo registrato.</h3>";
                    }
                    $conn->close();
                    ?>
                </table>

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
        </script>

    </body>
</html>
