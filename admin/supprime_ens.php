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
            $connexion =connex_objet_1();
            $matEns = $_GET['matricule'] ;
          //  $nomEns = $_GET['nom'];

            $requete = "DELETE from enseignant where matriculeEns=$matEns";
            $res = oci_parse($connexion,$requete) ;
            oci_execute($res,OCI_NO_AUTO_COMMIT);
            oci_commit($connexion) ;
            if($res)
            {
                echo "<div class=\"container\"><h3>Vous avez supprimer Madame/Monsieur de la liste des enseignants </h3></div>";

            }
     else
         echo "<div class=\"container\"><h3>Erreur de supression</h3></div>" ;


    ?>

           <a href="index.php">Revenir à la page précédente !</a>
</body>
</html>