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
        <th scope="col">marquer</th>

    </tr>
    </thead>
    <tbody>
    <?php
        if(isset($_POST['matiere'])&&isset($_POST['matriculeEns'])) {
            $matricEns = $_POST['matriculeEns'] ;
            $mat = $_POST['matiere'] ;
            $req = "SELECT e.MATRICULEENS, e.NOMENS,e.PRENOMENS ,to_char(asm.IDSCE,'DD/MM/YYYY HH24:MI') , asm.codesce from ALOUER_SEANCE_MATIERE asm ,COMPOSER_EMPLOI_SEANCE ces, ENSEIGNANT E  ,ENSEIGNER_MATIERE_CLASSE  emc,CLASSE c where  c.IDEMPLOI=ces.IDEMPLOI and c.codeClass=emc.codeClass and c.idEmploi=ces.IDEMPLOI and asm.codeMat= $mat and ces.CODESCE=asm.CODESCE and emc.matriculeEns=$matricEns and emc.codeMat=asm.codemat and  emc.MATRICULEENS=E.MATRICULEENS and ces.IDSCE=asm.IDSCE";
            $r = oci_parse($cnx, $req);
            oci_execute($r);
            while ($row =oci_fetch_array($r,OCI_NUM)) {
                echo "<tr>";

                foreach ($row as $value) {
                    echo "<td>$value</td>";
                }
                echo "<td><a href=\"marquer_ens_abs.php?matricule={$row[0]}&idsce={$row[3]}&codsce={$row[4]}\">Marquer</a></td></tr>";


            }

        }
    ?>
    </tbody></table>
<a href="../index.php">Déconnecter</a>

</body>
</html>