<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<?php
    /**
     * Created by PhpStorm.
     * User: haifa
     * Date: 30/11/2018
     * Time: 22:13
     */
    include_once("cnx_admin.php");

    if(isset($_POST['codc'])) {
        $conn =connex_objet_1();
        $codc = $_POST['codc'];
        $req = " select  m.CODEMAT  ,m.desmat from matiere m ,ENSEIGNER_MATIERE_CLASSE EMC, enseignant E,classe c where EMC.codeclass=$codc  AND  EMC.codemat=m.CODEMAT and emc.MATRICULEENS=e.MATRICULEENS and c.CODECLASS=emc.CODECLASS";
        $res = oci_parse($conn,$req);
        oci_execute($res);
        echo "<form method=\"post\" action=\"gerer_abs_etud_admin.php\" class=\"formulaire\"><FIELDSET>" ;
        echo"Matieres :  <select name=\"matiere\">";
        while ($row = oci_fetch_assoc($res)) {
            echo "<option value=\"{$row['CODEMAT']}\">{$row['DESMAT']}</option>";

        }

        echo "</select>";
        ?>
    <input type="hidden" value="<?php echo $codc; ?>" name="codeclass" />
    <input type="submit" value="afficher les etudiants">
    </fieldset>
    </form>
    <?php
    }
    else echo "erreur " ;
    ?>

</body>
</html>