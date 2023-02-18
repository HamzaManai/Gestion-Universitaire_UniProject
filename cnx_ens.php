<?php

function connex_objet()
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
