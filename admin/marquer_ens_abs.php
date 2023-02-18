<?php
/**
 * Created by PhpStorm.
 * User: haifa
 * Date: 30/11/2018
 * Time: 17:38
 */

    include_once("cnx_admin.php");
    $conn=connex_objet_1();
    $matricule = $_GET['matricule'] ;
    $idsce = $_GET['idsce'] ;
    $codsce = $_GET['codsce'] ;

    $requete1 = "INSERT INTO S_BSENTER_ENSEIGNANT (IDSCE,CODESCE,MATRICULEENS) values (to_date('$idsce','DD/MM/YYYY HH24:MI'),$codsce,$matricule)" ;
    $res1 = oci_parse($conn,$requete1) ;
    oci_execute($res1) ;
    if (oci_num_rows($res1)>0)
    {
        echo " l\'enseignant est marquer absent" ;
    }    else echo "Erreur " ;






