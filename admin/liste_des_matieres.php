<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title></title>


</head>
<body>

  <?php


    require_once("cnx_admin.php");
    $cnx = connex_objet_1();

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
                 <th scope="col">Code Matieres</th>
                 <th scope="col">Matieres</th>
                 <<th scope="col">Classe</th>
                 <th scope="col">Nom enseignant</th>
                 <th scope="col">Prenom enseignant</th>
                
               </tr>
        </thead>
        <tbody>
    <?php

            
          $req="SELECT EMC.codemat,desmat,nomclass,nomEns,prenomEns from ensignant E,classe C,matirer M ,enseigner_matiere_classe EMC where E.matriculeEns=EMC.matriculeEns and EMC.codeclass =C.codeclass AND EMC.codeMat=m.codeMat";
            $r = oci_parse($cnx,$req) ;
            oci_execute($r);
                 while($row = oci_fetch_assoc($r))
                 {
                        echo "<tr>" ;

                    foreach ($row as $value )
                    {
                        echo "<td>$value</td>" ;

                    }
                    echo "</tr>";
                    ?>

                    <td><a href="supprime_matiere.php?del=<?php $row['codemat'] ?>?mat=<?php $row['desmat'] ?>" class=\"btn btn-sm btn-danger\">delete</a></td>"

                  </tr></tbody></table>

           <?php
                }

            ?>
                  <a href="index.php">Revenir à la page précédente !</a>
        </tbody>
        </table>
   

    </body>
    </html>