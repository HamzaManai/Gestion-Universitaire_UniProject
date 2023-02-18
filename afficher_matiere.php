<html>
<head>
    <title></title>
    <link href="/bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <link href="/bootstrap-3.3.7/dist/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<?php
    if (isset($_POST['nomclass']) && isset($_POST['matr']))
    {
        $mat = $_POST['matr'] ;
        $class=$_POST['nomclass'];
        require_once("cnx_ens.php");
        $conn=connex_objet() ;
        $reqeute="SELECT codeclass from classe where nomclass='$class'";
        $reqete2 = oci_parse($conn,$reqeute) ;
        oci_execute($reqete2);
        $row1 = oci_fetch_assoc($reqete2);
        $codc = $row1['CODECLASS'] ;
        echo "<form method=\"post\" action=\"afficher_etd.php\" class=\"formulaire\">";
        echo"<FIELDSET><LEGEND align=\"top\">Critères d'affichage<LEGEND>";
        echo"Matieres :  <select name=\"matiere\">";
        $req1="select  m.CODEMAT  ,desmat from matiere m ,ENSEIGNER_MATIERE_CLASSE EMC, enseignant E,classe c where EMC.codeclass=$codc AND  EMC.codemat=m.CODEMAT and emc.MATRICULEENS=e.MATRICULEENS and c.CODECLASS=emc.CODECLASS " ;
        $req2 = oci_parse($conn,$req1) ;
        oci_execute($req2);
        while($row = oci_fetch_assoc($req2))
        {
                echo "<option value=\"{$row['CODEMAT']}\">{$row['DESMAT']} </option>" ;

        }

        echo"</select>" ;

    ?>

        <input type="hidden" value="<?php echo $mat; ?>" name="matr" />
        <input type="hidden" value="<?php echo $codc; ?>" name="codeclass" />
        <input type="submit" value="afficher les etudiants">
    </fieldset>
    </form>

<?php
        }


?>





<a href="index.php">Revenir à la page précédente !</a>

</body>
</html>