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
    <meta charset="UTF-8">
    <title>Modifica dati personali amministratore</title>
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
                <a href="modifica_amministrazione.php" class="w3-bar-item w3-button elementoAccordion bottoneCliccato">Modifica propri dati personali</a>
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
                <h1>Modifica i tuoi dati</h1>
                <form action="javascript:loadDoc();" method="post">
                    <table>
                        <?php
                        $conn = connetti();
                        
                        $qry = "SELECT * FROM amministrazione , registrazione_amministrazione  WHERE id_amministrazione=fk_id_amministrazione AND id_amministrazione='" . $_SESSION['id'] . "'";

                        $result = $conn->query($qry);

                        while ($row = $result->fetch_assoc()) {
                            echo"<tr><td>Nome:</td><td colspan='2'>" . $row['nome'] . "</td><td></td></tr>" .
                            "<tr><td>Cognome:</td><td colspan='2'>" . $row['cognome'] . "</td><td></td></tr>" .
                            "<tr><td>Codice fiscale:</td><td colspan='2'>" . $row['codice_fiscale'] . "</td><td></td></tr>" .
                            "<tr><td>Data di nascita:</td><td colspan='2'>" . $row['data_nascita'] . "</td><td></td></tr>" .
                            "<tr><td>Telefono:</td><td><input id='telefono' type='text' maxlength='10' value='" . $row['telefono'] . "'/></td><td></td></tr>" .
                            "<tr><td>Email:</td><td><input id='email' type='email' value='" . $row['email'] . "'/></td><td></td></tr>" .
                            "<tr><td>Username:</td><td><input id='username' type='text' value='" . $row['username'] . "' ></td><td></td></tr>" .
                            "<tr><td>nuova password:</td><td><input id='password2' type='password' value=''  minlength='5' required></td><td><input type='checkbox' onclick='visibilitaPassword1()'>Mostra password</td></tr> " .
                            "<tr><td>conferma password:</td><td><input id='password3' type='password' value=''  required></td><td><input type='checkbox' onclick='visibilitaPassword2()'>Mostra password</td></tr>" .
                            "<tr><td colspan='2'><div align='right'><input type='submit' value='Invia' class='bottone'></div></td></tr>";
                        }

                        $conn->close();
                        ?>
                    </table>
                </form>
            </div>
			</center>
        </div>

        <script>
            function loadDoc() {
                if ((document.getElementById("password2").value == document.getElementById("password3").value)) {
                    var xhttp = new XMLHttpRequest();

                    var tel = document.getElementById("telefono").value;
                    var email = document.getElementById("email").value;
                    var username = document.getElementById("username").value;
                    var pass2 = document.getElementById("password2").value;
                    var pass3 = document.getElementById("password3").value;
                    var id_amministrazione = document.getElementById("id").innerHTML;
                    xhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            //uso il trim che elimina gli sazi e gli a capo
                            var risp = this.responseText.trim();
                            //controllo che la modifica dei dati sia andata a buon fine se si modifico anche il suo account
                            if (risp == "Registrazione effettuata correttamente.") {

                                loadDoc2(username, pass3, id_amministrazione);
                            } else {
                                alert(this.responseText.trim());
                            }


                            document.getElementById("password2").value = "";
                            document.getElementById("password3").value = "";
                        }
                    };

                    query = "UPDATE amministrazione SET telefono='" + tel + "',email='" + email + "' WHERE id_amministrazione='" + id_amministrazione + "'";

                    xhttp.open("GET", "inserimentoDB.php?query=" + query, true);
                    xhttp.send();
                } else {
                    alert("Le password devono essere uguali");
                }
            }
            function loadDoc2(username, password, id_amministrazione) {
                if ((document.getElementById("password2").value == document.getElementById("password3").value)) {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            //uso il trim che elimina gli sazi e gli a capo
                            alert(this.responseText.trim());
                        }
                    };
                    //non invio direttamente la password ma la invio attraverso l'ajax poichè poi sara inserimentoDBPasswrd a fare l'mmd5 ed aggiungero alla query
                    query = "UPDATE registrazione_amministrazione SET username='" + username + "',password='cambiaQuestaPassword' WHERE fk_id_amministrazione='" + id_amministrazione + "'";

                    xhttp.open("GET", "inserimentoDBPassword.php?query=" + query + "&password=" + password, true);
                    xhttp.send();
                } else {
                    alert("");
                }
            }

            function visibilitaPassword1() {

                var x = document.getElementById("password2");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }

            function visibilitaPassword2() {

                var x = document.getElementById("password3");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
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
