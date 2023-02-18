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
         require_once("cnx_ens.php");
        $cnx=connex_objet() ;
    ?>




	<form method="post" action="afficher_matiere.php" class="formulaire">
		<FIELDSET><LEGEND align="top">Critères d'affichage<LEGEND>
				Classe :   <select name="nomclass">

<?php
            $mat = $_GET['matr'] ;
            $req="select nomClass from classe C , enseignant E ,enseigner_matiere_classe EMC ,matiere m where E.matriculeEns=EMC.matriculeEns and EMC.codeclass =C.codeclass AND EMC.codeMat=m.codeMat and E.MATRICULEENS=$mat";
            $r=oci_parse($cnx,$req);
            oci_execute($r);
            
                while($row = oci_fetch_assoc($r)) {

                    foreach ($row as $value) {
                        echo "<option>$value</option>";
                    }
                }

			
	 ?>

	    
					</select>
                    <input type="hidden" value="<?php echo $mat ; ?>" name="matr" />
					<input type="submit" value="afficher les Matieres">
		</fieldset>
	</form>

		<a href="index.php">Revenir à la page précédente !</a>

</body>
</html>