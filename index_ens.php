<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/bootstrap-3.3.7/dist/css/bootstrap.min.css"/>
  <link href="/bootstrap-3.3.7/dist/css/bootstrap.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title></title>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ISET</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
   </form>
  </div>
</nav>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	  <div class="form-group">
			<label >matricule  </label>
			<input type="text" class="form-control" name="login" >
	  </div>
	  <div class="form-group">
			<label>mot de passe : </label>
			<input type="password" class="form-control" name="password" placeholder="Saisir Votre Nom ">
	  </div>
		<input type="submit">
  </form>
<?php

    if (isset($_POST['login']) && isset($_POST['password']))
    {
            include_once("cnx_ens.php");
             $connexion =connex_objet();
             $login = $_POST['login'] ;
            $password = $_POST['password'] ;
            $reponse = "SELECT * FROM Enseignant WHERE  matriculeEns='$login' AND  nomEns= '$password'" ;
            $r = oci_parse($connexion,$reponse) ;
            oci_execute($r);

        if (oci_fetch_array ($r) ==false)
        {

                echo "<span class=\"badge badge-pill badge-warning\">Erreur</span>" ;
                oci_close($connexion);
        }
        else
        {
                echo " Salut Monsieur/Madame $password</br> <a href=\"afficher_class.php?matr=$login\"> afficher votre classe </a> ";

        }
    }




?>

</body>
</html>