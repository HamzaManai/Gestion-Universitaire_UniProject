<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link href="/bootstrap-3.3.7/dist/css/bootstrap.min.css">
  <link href="/bootstrap-3.3.7/dist/css/bootstrap.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->

	<title></title>
</head>
<body>
<?php

     include_once("cnx_ens.php");
     if(isset($_POST['type']) && isset($_POST['note']) && isset($_POST['matricule']) && isset($_POST['codemat']))
     {
            $conn =connex_objet();
            $note = $_POST['note'] ;
            $type = $_POST['type'] ;
            $codemat= $_POST['codemat'] ;
            $matEtd = $_POST['matricule'] ;
            $requete = "INSERT into avoir_note VALUES ($matEtd,$codemat,'$type',$note) ";
            $res = oci_parse($conn,$requete) ;
            oci_execute($res,OCI_NO_AUTO_COMMIT);
            oci_commit($conn) ;
            if($res)
                echo "<div class=\"container\"><h3>La note a ete saisie  </h3></div>";

     }
     else
         echo "<div class=\"container\"><h3>Erreur d'insertion de la note</h3></div>" ;


    ?>
</body>
</html>