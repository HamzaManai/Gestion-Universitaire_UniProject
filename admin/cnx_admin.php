<?php
/**
 * Created by PhpStorm.
 * User: Nour
 * Date: 12/2/2018
 * Time: 7:16 PM
 */

function connex_objet_1()
{
    try
    {
		$idom = oci_connect('php', 'php', 'localhost/XE');
       return $idom; 
    }
    catch(Exception $e)
    {
        echo 'erreur :'.$e->getMessage().'<br/>';
        echo 'N :'.$e->getCode();
        return null;
    }

}

