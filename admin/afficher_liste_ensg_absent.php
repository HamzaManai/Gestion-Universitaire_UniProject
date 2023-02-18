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


<table class="table">
    <thead>
    <tr>
        <th scope="col">Matricule</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Date</th>
        <th scope="col">seance</th>

    </tr>
    </thead>
    <tbody>
    <?php

        $req = "SELECT sbe.MATRICULEENS, e.NOMENS,e.PRENOMENS ,to_char(sbe.IDSCE,'DD/MM/YYYY HH24:MI'),sbe.CODESCE  from S_BSENTER_ENSEIGNANT sbe ,ENSEIGNANT e where e.MATRICULEENS=sbe.MATRICULEENS ";
        $r = oci_parse($cnx, $req);
        oci_execute($r);
        while ($row =oci_fetch_array($r,OCI_NUM)) {
            echo "<tr>";

            foreach ($row as $value) {
                echo "<td>$value</td>";
            }


        }


    ?>
    </tbody></table>
<a href="../index.php">Déconnecter</a>

</body>
</html>