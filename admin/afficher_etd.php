<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>

<?php    
    include_once("cnx_admin.php");

            $conn = connex_objet();
            $classe = $_POST['nomclass'];
            $reqete = "SELECT codeclass from classe where nomclass='$classe'";
            $reqete2 = oci_parse($conn, $reqete);
            oci_execute($reqete2);
            $row = oci_fetch_assoc($reqete2);
            $codc = $row['CODECLASS'];
            $requete = "select MATRICULEETD,NOMETD,prenomETD from etudiant where CODECLASS=$codc ORDER BY MATRICULEETD";
            $res = oci_parse($conn, $requete);
            oci_execute($res);
            echo "<table class=\"table\"><thead><tr><th scope=\"col\">Matricule</th> <th scope=\"col\">Nom</th><th scope=\"col\">Prenom</th><th scope=\"col\">Delete</th></tr> </thead><tbody>";
            while ($ligne = oci_fetch_assoc($res)) {
                echo "<tr>";
                foreach ($ligne as $valeur) {
                    echo "<td>$valeur</td>";
                }
                ?>

              <!--  <td><a href="supprime_etd.php?del=<?php // echo  $ligne['MATRICULEETD'] ;?>$nom=<?php //echo $ligne['NOMETD'] ; ?>">delete</a></td>-->

                <td><a href="supprime_etd.php?del=<?php echo $ligne['MATRICULEETD'] ;?>">delete</a></td>
                <?php
            }
            echo "</tr></tbody></table>" ;

?>


        <a href="index.php">Revenir à la page précédente !</a>
</body>
</html>
