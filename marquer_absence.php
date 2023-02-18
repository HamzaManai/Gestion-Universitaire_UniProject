<?php
/**
 * Created by PhpStorm.
 * User: haifa
 * Date: 30/11/2018
 * Time: 17:38
 */
    include_once("cnx_ens.php");
    $conn=connex_objet();
    $matiere = $_GET['codm'] ;
    $mat = $_GET['matriculeEtd'] ;
    $requete0 ="select s.IDSCE , s.CODESCE from  ALOUER_SEANCE_MATIERE asm ,seance s where asm.CODEMAT=$matiere and asm.IDSCE= s.IDSCE and s.CODESCE= asm.CODESCE";
   $res0 = oci_parse($conn,$requete0) ;
    if(oci_execute($res0)){
        $requete1 = "INSERT INTO S_absenter_etd (IDSCE,CODESCE,MATRICULEETD) SELECT idsce,codesce,$mat FROM seance  where ((select sysdate from dual )>=( select idsce from dual )) and ((select sysdate from dual )<=( select idsce+ interval '90' minute from dual )) " ;
        $res1 = oci_parse($conn,$requete1) ;
        oci_execute($res1) ;
        if (oci_num_rows($res1)>0)
        {
            $reqeute2 = "select nomEtd from ETUDIANT where  matriculeEtd=$mat";
            $r = oci_parse($conn,$reqeute2) ;
            oci_execute($r);
            $ligne = oci_fetch_assoc($r);
            echo " l\'etudiant {$ligne['NOMETD']} est marquer absent" ;
            oci_commit($conn) ;
        }    else echo "Vous n'avez pas l'acces de marquer l'absence seul à votre seance " ;
    }





