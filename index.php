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
        <title>ALFA</title>
        <!--icona in alto vicino al titolo-->
        <link rel="icon" href="img/icona.ico" />
        <!--fogli css da cui prendere informazioni-->
        <link rel="stylesheet" type="text/css" href="stili/stileBase.css">
        <style>
            h1{
                font-size:5vw;
            }
            table{
                font-size:25px;
            }

            .non-ridimensionare{
                width:100%;
                height: 100%;
                min-width: 800px;
            }
            .navbar {
                overflow: hidden;
                background-color: #333; 
            }

            .navbar a {
                float: left;
                font-size: 16px;
                color: #cc8800;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            .subnav {
                float: left;
                overflow: hidden;
            }

            .subnav .subnavbtn {
                font-size: 16px;  
                border: none;
                outline: none;
                color: #cc8800;
                padding: 14px 16px;
                background-color: inherit;
                font-family: inherit;
                margin: 0;
            }

            .navbar a:hover, .subnav:hover .subnavbtn {
                background-color: black;
                background-color: #080808;
            }

            .subnav-content {
                display: none;
                position: absolute;
                left: 0;
                background-color: #080808;
                width: 100%;
                z-index: 1;
            }

            .subnav-content a {
                float: right;
                color: #cc8800;
                text-decoration: none;
            }

            .subnav-content a:hover {
                background-color: #cc8800;
                color: black;
            }

            .subnav:hover .subnav-content {
                display: block;
            }
        </style>
    </head>
    <body>
        <!-- Nav bar -->
        <div class="navbar">
            <div style="float: left;">
                <img src="img/icona.ico">
            </div>
            <div style="float: right;">
                <div class="subnav">
                    <button class="subnavbtn"  style="height: 51px;">Registrati</button>
                    <div class="subnav-content">
                        <a href="registrazione_account_cliente.php">Registrazione account cliente</a>
                    </div>
                </div> 
                <div class="subnav">
                    <button class="subnavbtn" style="height: 51px;">Login<i class="fa fa-caret-down"></i></button>
                    <div class="subnav-content">
                        <a href="accessoCliente.php">Login cliente</a>
                        <a href="accessoAmministrazione.php">Login amministrazione</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="non-ridimensionare">
            <h1 style="text-align:center;padding-top:15px">BENVENUTO ALL'AUTOFFICINA<br> <span  style="font-size:200%; font-family:Impact">ALFA</span></h1>

            <!-- Inizio robe -->
            <div style="background-color: #333; background:rgba(8,8,8,0.7); text-align: center;">
                <br>
                <h3>Autofficina ALFA nazionale</h3>
                <div style="margin: 0px auto; text-align: center; width: 40%; font-size: 20px;">L’Autofficina ALFA ha segnato, con la sua esperienza, un solco profondo per professionalità e qualità degli interventi nell’ambito dei servizi offerti per la cura e la messa a punto delle automobili di ogni marca e cilindrata. La grande esperienza abbraccia praticamente ogni ambito e problematica dell’automobile: dalla messa a punto del motore, alla manutenzione, fino alla diagnosi computerizzata. Ogni servizio offerto è garantito dall'assoluta competenza e qualificata qualità del personale al lavoro, assolutamente specializzato e preparato per interventi di qualsiasi genere.</div>
                <br>
                <img src="img/mec.jpg" width="480px" height="270px" style="opacity: 1">
                <br><br><br>
            </div>

            <div style="background:rgb(40,40,40,0.7); overflow: auto;">
                <table style="padding-bottom: auto; margin:auto; width: 100%; text-align: center; height: 250px; max-width: 1000px">
                    <tr>
                        <td style="text-align: center;font-size: 20px;"><p style="font-size: 40px;"><div style="">Servizi e prodotti</p><hr style="border: none; min-height: 2px; background-color: #333;"><br>L’Autofficina ALFA ha a cuore il perfetto funzionamento del vostro veicolo. Per questo è disponibile, 24 ore su 24, un servizio di soccorso stradale. Una volta presa in consegna l’automobile la competenza e l’esperienza del personale saranno in grado di risolvere tutti i problemi e fornire tutti gli upgrade necessari per il miglior rendimento del mezzo. Presso l'autofficina, infatti, sono disponibili una serie di servizi di qualità unica: diagnosi elettronica; revisione dei cambi meccanici; ricarica dell’aria condizionata; assistenza per i problemi agli impianti di condizionamento; installazione di sensori per il parcheggio; impianti audio e video; accessori per l’automobile e moduli aggiuntivi.</div>
                        </td>
                        <!-- Centro l'immagine degli pneumatici verticalmente -->
                        <td ><p><img src="img/pneuma.png" width="420px" height="250px">
                        </td>
                    </tr>
                </table>
            </div>

            <div style="background:rgb(8,8,8,0.7); text-align: center; height: 450px;">

                <table class="table" style="padding:auto;margin-left:auto;margin-right:auto;width: 100%;max-width: 1000px;">
                    <tr>
                        <td><div style="margin: 0px auto;width: 100%;text-align: center; font-size: 20px;"><p style="font-size: 40px;">Al servizio dell'automobile</p><hr style="border: none; min-height: 2px; background-color: #333;"><br>L’Autofficina ALFA si distingue dalle altre attività del genere per l’esperienza trentennale accumulata, lavorando su automobili di ogni marca: dalle grandi berline alle piccole utilitarie. Un impegno che ha fatto crescere in maniera esponenziale la conoscenza e l’affidabilità negli interventi disponibili anche per i problemi meno usuali. Il servizio dell’autofficina Cavalli Paolo non lascia nulla al caso e prende in carico la vostra auto garantendovi il ritiro e la consegna a domicilio con estrema puntualità.</div></td>
                        <td><div style="margin: 0px auto;width: 100%;text-align: center; font-size: 20px;"><p style="font-size: 40px;">Cambio gomme</p><hr style="border: none; min-height: 2px; background-color: #333;"><br>La completezza dei servizi offerti dall’Autofficina ALFA si realizza con la possibilità di poter sostituire le gomme della vostra automobile con la garanzia e la sicurezza che contraddistinguono il lavoro dello staff. Le migliori marche di pneumatici per qualsiasi tipologia di terreno e qualsiasi clima sono disponibili per le vostre necessità. Si offre l'affidabilità di grandi marche di pneumatici.</div></td>
                    </tr>
                </table>
            </div>
            <!-- Fine robe -->

            <div style="background-color: #333; height: 60px; line-height: 60px;">
                <center><h2>Chiamate l'Autofficina ALFA allo 06 87653501 per un appuntamento</h2></center>
            </div>
            <div style="background-color: black; line-height: 160%; margin: 0px auto;text-align: center;">
                <br>
                <b style="font-size: 20px;">AUTOFFICINA ALFA</b>
                <br>
                Centrale - via Pollenza, 115
                <br>
                00156 Roma
                <br>
                06 87653501 | autofficinalfa@gmail.com
                <br>
                <br>
                <a href="https://www.facebook.com/andrea.jiang.334"><img src="img/fbico.png" width="32px" height="32px"></a>
                <a href="https://www.instagram.com/manuelzarra/?hl=it"><img src="img/igico.png" width="32px" height="32px"></a>
            </div>
            <div style="background-color: #333; height: 60px; line-height: 60px;text-align: center;">
                <h6 style="font-size: 15px;">Powered by jiang<?php echo "&"; ?>co - Paginerosse.jp</h6>
            </div>
        </div>
    </body>
</html>