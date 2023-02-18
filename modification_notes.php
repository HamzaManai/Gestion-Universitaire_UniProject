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
    if(isset($_POST['note'])) {
        $conn = connex_objet();
        $note = $_POST['note'];
        $type = $_POST['type'];
        $matr = $_POST['matricule'];
        $requete = "UPDATE AVOIR_NOTE set note=$note where matriculeEtd=$matr and typenote='$type'";
        $res = oci_parse($conn, $requete);
        if (oci_execute($res)) {
            $reqeute = "select nomEtd from ETUDIANT where  matriculeEtd=$matr";

            $r = oci_parse($conn,$reqeute) ;
            oci_execute($r);
            $ligne = oci_fetch_assoc($r);?>
            <div class="container">
                <h3><?php echo " La modification du note de  {$ligne['NOMETD']} est effectué sa nouvelle note est $note"; ?></h3>
            </div>

        <?php }

        }
    		else echo "veuillez saisire une note" ;

    ?>




</body>
</html>

