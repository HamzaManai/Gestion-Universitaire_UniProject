<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<title></title>
</head>
<body>
<?php

     include_once("cnx_admin.php");

            $connexion =connex_objet();
            $matEtd = $_GET['del'];
            // kifeh n3afi 2 parametres fel liens
            $nom = $_GET['nom'];
            echo "$nom" ;
            $requete = "DELETE from etudiant where matriculeEtd=$matEtd";
            $res = oci_parse($connexion,$requete) ;
            oci_execute($res,OCI_NO_AUTO_COMMIT);
            if($res)
            {
                oci_commit($connexion);
                echo "<div class=\"container\"><h3>l'etudiant de matricule  $matEtd  n'appartient plus a cette class </h3></div>";

            }
     else
         echo "<div class=\"container\"><h3>Erreur de supression</h3></div>" ;


    ?>
</body>
</html>