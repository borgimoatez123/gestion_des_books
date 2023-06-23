<?php
$hote='localhost'; 
$nom_bd='biblio';  
$utilisateur='root';  
$mot_passe=''; 
try
{
	$connexion = new PDO('mysql:host='.$hote.';dbname='.$nom_bd,$utilisateur, $mot_passe); 
}
catch(Exception $e) 
{ 
    echo 'Erreur : '.$e->getMessage().'<br />'; 
    echo 'N° : '.$e->getCode(); 
}
?>