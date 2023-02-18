<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title></title>


</head>
<body>


<?php


require_once("cnx_admin.php");
$cnx = connex_objet_1();


?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">ISET</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

    <?php
        echo "<form method=\"post\" action=\"affich_sean_ens.php\" class=\"formulaire\">";
        echo"<FIELDSET><LEGEND align=\"top\">Critères d'affichage<LEGEND>";
        echo"Enseignants :  <select name=\"codeEns\">";
        $req1="SELECT MATRICULEENS,NOMENS from enseignant";
        $req2 = oci_parse($cnx,$req1) ;
        oci_execute($req2);
        while($row = oci_fetch_assoc($req2))
        {
            echo "<option value=\"{$row['MATRICULEENS']}\">{$row['NOMENS']} </option>" ;
        }
        echo"</select>" ;
    ?>

    <input type="submit" value="afficher ses seances ">
    </fieldset>
    </form>
    </tr></tbody></table>
    <a href="../index.php">Revenir à la page précédente !</a>

</body>
</html>