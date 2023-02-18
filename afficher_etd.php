<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>

<?php    
    include_once("cnx_ens.php");
	if((isset($_POST['matr']))&& (isset($_POST['matiere'])) && (isset($_POST['codeclass'])) )
	{
		$conn =connex_objet();

        $codc = $_POST['codeclass'] ;
        $matiere = $_POST['matiere'] ;
        $matrEns = $_POST['matr'] ;
		$requete ="select matriculeEtd,nomEtd,prenomETD from etudiant where CODECLASS='$codc' ORDER BY MATRICULEETD" ;
		$res = oci_parse($conn,$requete) ;
		oci_execute($res);
		echo "<table class=\"table\"><thead><tr><th scope=\"col\">Matricule</th> <th scope=\"col\">Nom</th><th scope=\"col\">Prenom</th></tr></thead><tbody><tr>" ;
		while($ligne = oci_fetch_assoc($res))
		{
			echo "<tr>";
			foreach ($ligne as $valeur)
			{
				echo "<td>$valeur</td>";
			}

		}
		echo "</tr></tbody></table>" ;
		echo "<a href=\"aficher_etd_modifier_note.php?codeC=$codc&matiere=$matiere\">Modifier les notes</a></br>" ;
        echo "<a href=\"inserer_notes.php?codeC=$codc&matiere=$matiere\">Inserer des notes</a></br>" ;
		echo "<a href=\"afficher_note.php?codeC=$codc&matiere=$matiere\">Afficher les notes</a></br>" ;
		echo "<a href=\"noter_absence.php?codeC=$codc&matiere=$matiere\">Marquer les absences</a></br>" ;


	}
    

?>

        <!--<a class="btn btn-primary" type="submit" href="aficher_etd_modifier_note.php?nomclass=" role="button">modifier les notes</a>
        <a class="btn btn-primary" type="submit" href="aficher_note.php?nomclass="  role="button">afficher les notes</a>
        <a class="btn btn-primary" type="submit" href="noter_absance.php?nomclass="  role="button">noter les absences</a>-->
        <a href="index.php">Revenir à la page précédente !</a>
</body>
</html>
