<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title></title>

</head>
<body>


	<?php
		require_once("cnx_ens.php");
		$cnx= connex_objet();

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
      <th scope="col">matricule</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">type</th>
      <th scope="col">inserer note</th>
    </tr>
  </thead>
  <tbody>


<?php

    $codc= $_GET['codeC'] ;
    $matiere= $_GET['matiere'] ;

//$req="select e.matriculeEtd , e.nomEtd,e.prenomEtd ,m.CODEMAT from etudiant e, classe  c, enseigner_matiere_classe EMC , matiere m,ENSEIGNANT e  where c.codeclass =$codc and emc.matriculeEns=e.matriculeEns and m.codeMat = emc.codeMat and c.codeclass=emc.codeclass and m.CODEMAT=$matiere";
    $req ="select matriculeEtd,nomEtd,prenomETD from etudiant where CODECLASS='$codc' ORDER BY MATRICULEETD";
        $r = oci_parse($cnx,$req) ;
	    oci_execute($r);

        	 while($row = oci_fetch_assoc($r))
        	 {
        	 		echo "<tr>";

      			foreach ($row as  $value )
	     		{
	     			echo "<td>$value</td>" ;
				}


      ?>
                 <form method="post" action="saisie_notes.php">
        <td>
         <div class="form-group">
                <input type="text" class="form-control" name="type" placeholder="noteDS,noteTP,noteExm,TNP">
         </div>
        </td>
        <td>
            <div class="form-group">
             <input type="text" class="form-control" name="note">
         </div>
        </td>
            <input type="hidden" name="matricule" value="<?php echo $row['MATRICULEETD']?>"/>
                     <input type="hidden" name="codemat" value="<?php echo $matiere ;  ?>"/>
                     <td><button type="submit">confirmer</button></td>


			<?php	echo "</tr></form>";


       	}
	 ?>

  </tbody>
</table>
</body>
</html>