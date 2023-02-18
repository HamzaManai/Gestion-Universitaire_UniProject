<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<title></title>
</head>
<body>
<?php

     include_once("cnx_admin.php");
   
            $connexion =connex_objet();
            $desmat = $_GET['desmat'] ;
            $codemat = $_GET['del'] ;
            $requete = "DELETE matiere where codemat=$codemat ";
            $res = oci_parse($conn,$requete) ;
            oci_execute($res,OCI_NO_AUTO_COMMIT);
            oci_commit($connexion) ;
            if($res)
            {
                echo "<div class=\"container\"><h3>Vous avez supprimer $desmat de la liste des matieres </h3></div>" ;

            }
     else
         echo "<div class=\"container\"><h3>Erreur de supression de cette matiere </h3></div>" ;


    ?>

</body>
</html>