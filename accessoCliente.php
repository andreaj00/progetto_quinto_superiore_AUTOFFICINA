<!DOCTYPE html>
<?php
//elimino la sessione (nel caso ad esempio si accedesse a questa pagina dal logout dell'area riservata)
session_start();
if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Cliente</title>
        <!--icona in alto vicino al titolo-->
        <link rel="icon" href="img/icona.ico" />
        <!--fogli css da cui prendere informazioni-->
        <link rel="stylesheet" type="text/css" href="stili/stileBase.css">
        <!-- link icona-->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
    <body >
        <h1  style="text-align:center"> Accedi inserendo </h1>
        <a  href="index.php"  style="position:fixed;left: 15px;top:15px;"><button class="bottone"><i class="fa fa-angle-left"></i> Home</button></a>

        <!--l'action mi richiama la funzione js, inizialmente al posto di input submit utilizzavo un button ma in quel caso i vari controlli di html tipo REQUIRED non funzionava-->
        <form action="javascript:loadDoc();">
            <table align="center">
                <tr>
                    <td>username:
                    </td>
                    <td>
                        <input id="username" type="text" required>
                    </td>
                </tr>
                <tr>
                    <td>password:
                    </td>
                    <td rowspan="2">
                        <input id="password" type="password"required>
                        <br>
                        <a href="registrazione_account_cliente.php"><i class="link" >Se non sei registrato clicca qui!</i></a>
                    </td>
                </tr>
                <tr>
                </tr>
                <td colspan="2" align="right">
                    <input type="submit" value="accedi" class="bottone">
                </td>
                </tr>
            </table>
        </form>

        <script>
            function loadDoc() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        //uso il trim che elimina gli sazi e gli a capo
                        var risp = this.responseText.trim();
                        if (risp == "accesso consentito") {
                            //reindirizzamento alla pagina privata(area personale)
                            //alert("entra");
                            window.location.replace("privataCliente.php");

                        } else {
                            //password o username sbagliati
                            alert(risp);
                            document.getElementById("password").value = "";
                        }
                    }
                };
                var username = document.getElementById("username").value;
                var password = document.getElementById("password").value;
                var tipo = "cliente";
                //cripto la password
                //devo ancora capire come fare
                xhttp.open("GET", "controlloLogin.php?username=" + username + "&password=" + password + "&tipo=" + tipo, true);
                xhttp.send();
            }

        </script>


    </body>
</html>


