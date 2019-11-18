
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Meccanico</title>
        <!--icona in alto vicino al titolo-->
        <link rel="icon" href="img/icona.ico" />
        <!--fogli css da cui prendere informazioni-->
        <link rel="stylesheet" type="text/css" href="stili/stileBase.css">
    </head>
    <body >
        <?php
        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */
        ?>
		<center>
        <h1> Accedi inserendo </h1>
        <form action="indexmeccanico.php" method="post">

            <table align="center">
                <tr>
                    <td>username:
                    </td>
                    <td>
                        <input type="text" name="username" required>
                    </td>
                </tr>
                <tr>
                    <td>password:
                    </td>
                    <td>
                        <input type="password" name="password" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="right">

                        <input type="submit" value="accedi" class="bottone">
                    </td>
                </tr>
            </table>
        </form>
		</center>

    </body>
</html>


