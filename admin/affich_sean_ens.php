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
    if(isset($_POST['codeEns'])) {
        $mat= $_POST['codeEns'] ;
        echo "<form method=\"post\" action=\"marquer_ens.php\" class=\"formulaire\">";
        echo "<FIELDSET><LEGEND align=\"top\">Critères d'affichage<LEGEND>";
        echo "Les seances :  <select name=\"matiere\">";
        $req1 = "select desmat,emc.CODEMAT from matiere m ,ENSEIGNER_MATIERE_CLASSE EMC, enseignant E where  EMC.matriculeEns=$mat AND  EMC.codemat=m.CODEMAT and emc.MATRICULEENS=e.MATRICULEENS ";
        $req2 = oci_parse($cnx, $req1);
        oci_execute($req2);
        while ($row = oci_fetch_assoc($req2)) {
            echo "<option value=\"{$row['CODEMAT']}\">{$row['DESMAT']}</option>";
        }
        echo "</select>";?>
        <input type="hidden" value="<?php echo $mat ; ?>" name="matriculeEns">
    <input type="submit" value="marquer l'absence ">
    </fieldset>
    </form>
        <?php ?>
   <?php }
   else echo "erreur " ;
    ?>




<a href="../index.php">Revenir à la page précédente !</a>

</body>
</html>