
/**
 * Created by PhpStorm.
 * User: haifa
 * Date: 04/12/2018
 * Time: 12:21
 */


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title></title>


</head>
<body>


  <?php


    require_once("cnx_admin.php");
    $cnx = connex_objet();


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
                 <th scope="col">specEns</th>
                 <th scope="col">Absences</th>

               </tr>
        </thead>
        <tbody>
    <?php


            $req="SELECT matriculeEns,nomEns,prenomEns,specEns  from enseignant";
            $r = oci_parse($cnx,$req) ;
            oci_execute($r);
            while($row = oci_fetch_assoc($r))
            {
                       echo "<tr>" ;

                    foreach ($row as $value )
                    {
                        echo "<td>$value</td>" ;

                    }


                   // echo "<td><a href=\"supprime_ens.php?matricule={$row['MATRICULEENS']}?nom={$row['NOMENS']}\">delete</a></td>" ;
                    echo "<td><a href=\"supprime_ens.php?matricule={$row['MATRICULEENS']}\">delete</a></td>" ;


            }

            ?></tr></tbody></table>
                    <a href="index.php">Revenir à la page précédente !</a>

    </body>
    </html>