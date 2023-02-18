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
</nav>

<?php

if (isset($_POST['login']) && isset($_POST['password']))
{
    include_once("cnx_ens.php");
    $connexion =connex_objet();
    $login = $_POST['login'] ;
    $password = $_POST['password'] ;
    $reponse = "SELECT * FROM Enseignant WHERE  matriculeEns=$login AND  nomEns='$password'" ;
    $r = oci_parse($connexion,$reponse) ;
    oci_execute($r) ;
    if (oci_fetch_array($r))
    {
        echo "Vous etes connecté comme Enseignant  Salut Monsieur/Madame $password" ;
        echo"</br> <a href=\"afficher_class.php?matr=$login\"> afficher votre classe </a> ";

    }
    else if (oci_fetch_array($r) == false )
    {
        oci_close($connexion);
        include_once("admin/cnx_admin.php");
        $connexion =connex_objet_1();
        $reponse = "SELECT * FROM ADMINISTRATEUR WHERE ID_ADMIN=$login AND pass='$password'" ;
        $r = oci_parse($connexion,$reponse) ;
        oci_execute($r) ;
        if(oci_execute($r))
        {
            ?>

            <p>vous etes connecté  en tant qu'administrateur </p> <br/>
            <a href="admin/liste_des_classes.php"> les absences des etudiants selectionner un classe </a><br/>
            <a href="admin/liste_des_enseignant.php">afficher les Enseignants</a>
            <br/><a href="admin/liste_ens_pour_marquer_abs.php">marquer un enseignant absent </a>
            <br/><a href="admin/afficher_liste_ensg_absent.php">afficher liste d'enseignant absent </a>
            <?php
        }

        else
        {
            echo "<span class=\"badge badge-pill badge-warning\">Erreur</span>" ;
            oci_close($connexion);

        }
    }
}
?>

</body>
</html>