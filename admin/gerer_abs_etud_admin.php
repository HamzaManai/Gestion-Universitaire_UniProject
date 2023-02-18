<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<body>

<?php
/**
 * Created by PhpStorm.
 * User: haifa
 * Date: 30/11/2018
 * Time: 22:13
 */
    include_once("cnx_admin.php");
    $connexion =connex_objet_1();
    $codm = $_POST['matiere'] ;
    $codc = $_POST['codeclass'] ;
    //$requete = " select absc.MATRICULEETD ,E.nomEtd,E.PRENOMETD , M.desMat,count(absc.MATRICULEETD) from S_ABSENTER_ETD absc , Etudiant E , Classe c ,ALOUER_SEANCE_MATIERE ASM , COMPOSER_EMPLOI_SEANCE CES,MATIERE M where E.MATRICULEETD =absc.MATRICULEETD AND c.codeclass=E.codeclass And C.idemploi = ces.idemploi and ces.idSce=asm.idSce and ces.CODESCE = ASM.CODESCE and  M.CODEMAT = asm.codeMat and ces.CODESCE=absc.CODESCE group by absc.MATRICULEETD,E.nomEtd,E.PRENOMETD , M.desMat" ;
    $requete = " select absc.MATRICULEETD ,E.nomEtd,E.PRENOMETD , M.desMat,count(absc.MATRICULEETD) ,count(absc.MATRICULEETD)/m.VLMHORMAT*1.3 from S_ABSENTER_ETD absc , Etudiant E  ,ALOUER_SEANCE_MATIERE ASM ,MATIERE M where E.MATRICULEETD =absc.MATRICULEETD and  M.CODEMAT = asm.codeMat and m.CODEMAT=$codm  and e.CODECLASS=$codc and absc.IDSCE=ASM.IDSCE group by absc.MATRICULEETD,E.nomEtd,E.PRENOMETD , M.desMat ,m.VLMHORMAT " ;
    $res = oci_parse($connexion,$requete) ;
    oci_execute($res);
    echo "<table class=\"table\"><thead><tr><th scope=\"col\">Matricule</th><th scope=\"col\">Nom</th><th scope=\"col\">Prenom</th><th scope=\"col\">Matiere</th><th scope=\"col\">nombre total d'absence</th><th scope=\"col\">Taux d'absence</th><th scope=\"col\">Eliminé(e)</th></tr></thead><tbody><tr>" ;
    while($ligne = oci_fetch_array($res,OCI_NUM))
    {
        echo "<tr>";
            echo "<td>$ligne[0]</td>";
            echo "<td>$ligne[1]</td>";
            echo "<td>$ligne[2]</td>";
            echo "<td>$ligne[3]</td>";
            echo "<td>$ligne[4]</td>";
            echo "<td>$ligne[5]</td>"; //echo number_format(floatval($ligne[5]), 2, ',', '') ;

            if($ligne[5] > 0.3) echo "<td style=\"background-color:powderblue;\">aaaa</td>" ;
            else echo "<td></td>" ;
            echo "</tr>" ;
    }
    echo "</tbody>" ;?>
</body>
</head>
</html>