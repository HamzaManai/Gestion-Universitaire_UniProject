<!DOCTYPE html>
<html>
<head>
 <title></title>
  <link href="/bootstrap-3.3.7/dist/css/bootstrap.min.css">
  <link href="/bootstrap-3.3.7/dist/css/bootstrap.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title></title>

	
</head>
<body>


	<?php


		require_once("cnx_ens.php");
		$cnx=connex_objet() ;
	

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
          <th scope="col">Matricule</th>
        <th scope="col">Nom</th>
          <th scope="col">Prenom</th>
          <th scope="col">presence</th>
    </tr>
  </thead>
  <tbody>
    <tr>

<?php
        $codc = $_GET['codeC'] ;
        $codm = $_GET['matiere'];
		$req="select MATRICULEETD,nomEtd, prenomEtd  from etudiant  where codeClass=$codc";
      $r=oci_parse($cnx,$req);
        oci_execute($r);

            while ($row = oci_fetch_assoc($r))
            {
                echo "<tr>";
                foreach ($row as $value) {
                    ?>

                    <td><?php echo $value; ?></td>


                    <?php
                }

                echo "<td><a href=\"marquer_absence.php?matriculeEtd={$row['MATRICULEETD']}&codm=$codm\"/><span class=\"glyphicon glyphicon-ok\"></span>marquer absent</a></td>";
            }
            ?>

  </tbody>
</table>

</body>
</html>