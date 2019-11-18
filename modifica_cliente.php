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
    <title>Modifica i propri dati</title>
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
            <a href="elimina_veicolo.php" class="w3-bar-item w3-button">Elimina veicolo</a>
            <a href="modifica_cliente.php" class="w3-bar-item w3-button bottoneCliccato">Modifica dati personali</a>
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
                <h1 style="text-align:center">Modifica i tuoi dati</h1>
                <form action="javascript:loadDoc();" method="post">
                    <table>
                        <?php
                        $conn = connetti();
                        $qry = "SELECT * FROM cliente , registrazione_cliente  WHERE id_cliente=fk_id_cliente AND id_cliente='" . $_SESSION['id'] . "'";

                        $result = $conn->query($qry);

                        while ($row = $result->fetch_assoc()) {
                            echo"<tr><td>Nome:</td><td colspan='2'>" . $row['nome'] . "</td></tr>" .
                            "<tr><td>Cognome:</td><td colspan='2'>" . $row['cognome'] . "</td></tr>" .
                            "<tr><td>Codice fiscale:</td><td colspan='2'>" . $row['codice_fiscale'] . "</td></tr>" .
                            "<tr><td>Data di nascita:</td><td colspan='2'>" . $row['data_nascita'] . "</td></tr>" .
                            "<tr><td>Telefono:</td><td><input id='telefono' type='text'  maxlength='10' value='" . $row['telefono'] . "'/></td></tr>" .
                            "<tr><td>Email:</td><td><input id='email' type='email' value='" . $row['email'] . "'/></td></tr>" .
                            "<tr><td>Username:</td><td><input id='username' type='text' value='" . $row['username'] . "' ></td></tr>" .
                            "<tr><td>nuova password:</td><td><input id='password2' type='password' value='' required></td><td><input type='checkbox' onclick='visibilitaPassword1()'>Mostra password</td></tr> " .
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
                    var id_cliente = document.getElementById("id").innerHTML;
                    xhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            //uso il trim che elimina gli sazi e gli a capo
                            var risp = this.responseText.trim();
                            //controllo che la modifica dei dati sia andata a buon fine se si modifico anche il suo account
                            if (risp == "Registrazione effettuata correttamente.") {

                                loadDoc2(username, pass3, id_cliente);
                            } else {
                                alert(this.responseText.trim());
                            }


                            document.getElementById("password2").value = "";
                            document.getElementById("password3").value = "";
                        }
                    };

                    query = "UPDATE cliente SET telefono='" + tel + "',email='" + email + "' WHERE id_cliente='" + id_cliente + "'";

                    xhttp.open("GET", "inserimentoDB.php?query=" + query, true);
                    xhttp.send();
                } else {
                    alert("Le password devono essere uguali");
                }
            }
            function loadDoc2(username, password, id_cliente) {
                if ((document.getElementById("password2").value == document.getElementById("password3").value)) {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            //uso il trim che elimina gli sazi e gli a capo

                            alert(this.responseText.trim());
                        }
                    };
                    //non invio direttamente la password ma la invio attraverso l'ajax poichè poi sara inserimentoDBPasswrd a fare l'mmd5 ed aggiungero alla query
                    query = "UPDATE registrazione_cliente SET username='" + username + "',password='cambiaQuestaPassword' WHERE fk_id_cliente='" + id_cliente + "'";

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
