<html>
<head>
    <title></title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <?php
        require_once("cnx_admin.php");
        $cnx=connex_objet_1() ;
    ?>

	<form method="post" action="afficher_matiere_classe.php" class="formulaire">
		<FIELDSET>


				Classe :   <select name="codc">

    <?php
            $req="select NOMCLASS,CODECLASS from classe ";
            $r=oci_parse($cnx,$req);
            oci_execute($r);


                while($row = oci_fetch_assoc($r))
                {
                        echo "<option value=\"{$row['CODECLASS']}\">{$row['NOMCLASS']}</option>" ;
				}
	 ?>
            </select>
            <button type="submit">Afficher les matieres</button>
		</fieldset>
	</form>

		<a href="index.php">Revenir à la page précédente !</a>

</body>
</html>