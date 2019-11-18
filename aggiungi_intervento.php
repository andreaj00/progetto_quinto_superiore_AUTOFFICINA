<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--fogli css da cui prendere informazioni-->
        <link rel="stylesheet" type="text/css" href="stili/accordion.css">

    </head>
    <body>
	<center>
        <button onclick="mostra(this)">Aggiungi un intervento</button>


        <div id="sezioneAggiungi" style="display:none">
            <br>

            <button class="accordion">SCEGLI INTERVENTO</button>
            <div class="panel"  id="campointervento">
                <table>
                    <tr><td>Tipo:
                            <select onchange="cambioTipoIntervento(this)"> 
                                <option value="" selected> </option>
                                <option value="lavoro su carrozzeria" >lavoro su carrozzeria</option>
                                <option value="lavoro impianto elettrico">lavoro impianto elettrico</option>
                                <option value="lavoro impianto meccanico">lavoro impianto meccanico</option>
                                <option value="lavoro su interni" >lavoro su interni</option>
                            </select>
                        </td>
                        <td style='width:33%'>nome:<select style='width:80%' onchange="cambioNomeIntervento(this)"> 
                                <option value="" selected> </option>
                            </select>
                        </td>
                        <td>
                            <table>
                                <tr><td>costo orario:€</td><td><input type='input' disabled></td></tr>
                                <tr><td>tempo previsto</td><td><input type='input' disabled></td></tr>
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
                            <select onchange="cambioCategoriaIntervento(this)"> 
                                <option value="" selected> </option>
                                <?php
                                // connessione al DataBase
                                include "connessioneDB.php";
                                // chiamata alla funzione di connessione
                                $conn = connetti();

                                // costruzione ed esecuzione query
                                $qry = "SELECT * FROM categoria ORDER BY nome;";
                                $result = $conn->query($qry);

                                // popolamento casella combinata
                                while ($row = $result->fetch_assoc()) {
                                    echo "<OPTION value = '" . $row['id_categoria'] . "'>" . $row['nome'] . "</OPTION>";
                                }
                                ?>
                            </select>
                        </td>
                        <td style='width:33%'>
                            <table>
                                <tr>
                                    <td>nome:</td>
                                    <td><select style='width:100%' onchange="cambioNomeProdotto(this)"> 
                                            <option value="" selected> </option>
                                    </td>
                                </tr>
                                <tr>
                                    <td>quantità:</td>
                                    <td><input type="number" min="0" max="100" required> 
                                    </td>
                                </tr>
                            </table>
                            </select>
                        </td>
                        <td>
                            <table>
                                <tr><td>costo orario:€</td><td><input type='input' disabled></td></tr>
                                <tr><td>sconto:</td><td><input type='input' disabled>%</td></tr>
                                <tr><td>aliquota:</td><td><input type='input' disabled>%</td></tr>
                                <tr><td>descrizione:</td><td><textarea disabled></textarea></td></tr>
                            </table>

                        </td>
                    </tr>
                </table>
                <button onclick="aggiungiCampoProdotto(this)">Aggiungi un'altro campo prodotto</button>
            </div>

            <button class="accordion">SCEGLI SMALTIMENTO</button>
            <div class="panel">
            </div>

            <button class="accordion">SCEGLI MECCANICO</button>
            <div class="panel">
            </div>

            <span id="ajax"></span>
        </div>
        <script>
            //gestisco gli accordion
            var acc = document.getElementsByClassName("accordion");

            var parti = false;//usato per far si che la funzione aspetti la risposta dell'aajax

            var cloneCampoProdotto = document.getElementById("campoProdotto").cloneNode(true);

            for (var i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function () {
                    this.classList.toggle("active"); //aggiungo la classe active (cambia l'icona con la freccia in su)
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                });
            }

            function mostra(x) {
                document.getElementById("sezioneAggiungi").style.display = "block";
                x.style.display = "none";
            }

            function cambioTipoIntervento(x) {
                var tipo = x.value;
                var query = "SELECT id_anagrafica_intervento,nome FROM anagrafica_intervento WHERE tipo='" + tipo + "'"
                var nColonne = 2;
                //eseguo la query
                loadDoc(query, nColonne);
                if (parti) {
                    parti = false;
                    var risposta = document.getElementById("ajax").innerHTML;
                    document.getElementById("ajax").innerHTML = "";

                    var arrayRisposta = risposta.split("*£*");

                    var selectNome = x.parentNode.nextElementSibling.children[0];
                    //creo option quanti sono gli elementi
                    //vado di 2 in 2
                    //parto da 1 poichè la prima posizione è vuota
                    for (var i = 1; i < arrayRisposta.length; i = i + 2) {
                        var option = document.createElement("OPTION");
                        option.value = arrayRisposta[i];//id_anagrafica_intervento
                        option.innerHTML = arrayRisposta[i + 1];//id_anagrafica_intervento

                        selectNome.appendChild(option);
                    }
                }
            }

            function cambioNomeIntervento(x) {
                var id = x.value;
                var query = "SELECT costo_orario,tempo_previsto,aliquota_da_aggiungere,percentuale_sconto,descrizione FROM anagrafica_intervento WHERE id_anagrafica_intervento='" + id + "'"
                var nColonne = 5;
                //eseguo la query
                loadDoc(query, nColonne);
                if (parti) {
                    parti = false;
                    var risposta = document.getElementById("ajax").innerHTML;
                    document.getElementById("ajax").innerHTML = "";

                    var arrayRisposta = risposta.split("*£*");

                    //input costo orario
                    x.parentNode.nextElementSibling.children[0].children[0].children[0].children[1].children[0].value = arrayRisposta[1];
                    //input tempo prevsto
                    x.parentNode.nextElementSibling.children[0].children[0].children[1].children[1].children[0].value = arrayRisposta[2];
                    //input scosto
                    x.parentNode.nextElementSibling.children[0].children[0].children[2].children[1].children[0].value = arrayRisposta[3];
                    //input aliquota
                    x.parentNode.nextElementSibling.children[0].children[0].children[3].children[1].children[0].value = arrayRisposta[4];
                    //input descrizione
                    x.parentNode.nextElementSibling.children[0].children[0].children[4].children[1].children[0].value = arrayRisposta[5];

                }
            }

            function cambioCategoriaIntervento(x) {

            }

            function cambioNomeProdotto(x) {

            }

            function aggiungiCampoProdotto(x) {
                var clone = cloneCampoProdotto.cloneNode(true);
                //gestisto l'alltezza dell'accodion
                var div = document.getElementById("divCampoProdotto");
                div.scrollHeight = div.scrollHeight + 148; //!!!148px altezza di questo campo prodotto


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
                        parti = true;
                    }
                };


                xhttp.open("GET", "ricercaCombo.php?query=" + query + "&nColonne=" + nColonne, false);
                xhttp.send();
            }
        </script>
	</center>
    </body>	
</html>