<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="stili/stileBase.css"> 
        
        <!--icona in alto vicino al titolo-->
        <link rel="icon" href="img/icona.ico" />
        <!-- link icona per tasto home-->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
        <title>Crea Account</title>
        <style>
            #trEmail{
                display:none;
            }
        </style>
    </head>
    <body>
		<center>
        <h1 style="text-align: center;">Crea un tuo account:</h1>
        <p  style="text-align: center;"><i>(solo se sei registrato presso l'autofficina puoi creare un account)</i></p>

        <a  href="index.php"  style="position:fixed;left: 15px;top:15px;"><button class="bottone"><i class="fa fa-angle-left"></i> Home</button></a>
        <form method="post" action="javascript:loadDoc();">
            <table align="center">
                <tr>
                    <td>Codice fiscale<span style="color: #990000;">*</span>:</td><td><input type="text" id="cod" maxlength="16" required></td><td></td>
                </tr>
                <tr id="trEmail">
                    <td>Email:</td><td><input type="email" id="email" maxlength="30" value="" ></td><td></td>
                </tr>

                <tr>
                    <td>Username<span style="color: #990000;">*</span>:</td><td><input type="text" id="username" maxlength="30" required></td><td></td>
                </tr>
                <tr>
                    <td>Password<span style="color: #990000;">*</span>:</td><td><input type="password" minlength="5" id="password" required</td><td><input type="checkbox" onclick="visibilitaPassword1()">Mostra password</td>
                </tr>
                <tr>
                    <td>Conferma Password<span style="color: #990000;">*</span>:</td><td><input type="password" id="password2" required</td><td><input type="checkbox" onclick="visibilitaPassword2()">Mostra password</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right"><input type="submit" value="Crea" class="bottone"></td>
                </tr>
            </table>
        </form> 
		</center>
        <script>
            function loadDoc() {
                //controlla se le password sono uguali
                if (document.getElementById("password").value == document.getElementById("password").value) {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            //uso il trim che elimina gli sazi e gli a capo
                            var risposta = this.responseText.trim();
                            
                            if(risposta=="creazione account effettuata correttamente"){
                                   //reindirizzo su login
                                   window.location.replace("accessoCliente.php");
                            }
                            //non c'è bisogno dell'else
                            if (risposta == "email non presente") {
                                //se la email non è presente creo il campo email
                                document.getElementById("trEmail").style.display = "table-row";
                                document.getElementById("trEmail").required;//il required non lo posso mettere direttamente nell'html altrimenti mi da problemi poichè il tr è hidden
                                alert("l'utente non ha nessuna email registrata, si prega di inserirne una");
                            } else {
                                alert(risposta);
                                var res = risposta.split(" e ")[0];
                                if (res == "email registrata correttamente") {
                                   //reindirizzo su login
                                   window.location.replace("accessoCliente.php");
                                }
                            }
                        }
                    };
                    var codiceFiscale = document.getElementById("cod").value;
                    var username = document.getElementById("username").value;
                    var password = document.getElementById("password").value;
                    var email = document.getElementById("email").value;

                    //cripto la password
                    //devo ancora capire come fare
                    xhttp.open("GET", "controlloEmail.php?codiceFiscale=" + codiceFiscale + "&username=" + username + "&password=" + password + "&email=" + email, true);
                    xhttp.send();
                } else {
                    alert("ATTENZIONE le password non sono uguali");
                }
            }


            function visibilitaPassword1() {

                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }

            function visibilitaPassword2() {

                var x = document.getElementById("password2");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    </body>
</html>