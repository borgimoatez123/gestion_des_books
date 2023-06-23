<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- formulaire d'ajout d'un livre   -->
<form name="f" action="" method="POST">
<H1>Formulaire Ajout Livre</h1>
<table border='0'>
<tr><td>Code</td>
<td><input type="text" name="code"/></td></tr>
<tr><td>Titre</td>
<td><input type="text" name="titre"/></td></tr>
<tr><td> Auteur </td>
<td><input type="text" name="auteur"/></td></tr>
<tr><td>Prix </td>
<td><input type="text" name="prix"/></td></tr>
<tr><td>Editeur </td>
<td><select name="editeur">
<?php
//connexion
include ("connexion.php");
//requette de selection des editeurs pour remplir le liste des choix de l'éditeur
$select=$connexion->query('SELECT * FROM editeurs');
//parcourir et afficher le code et nom éditeur tant que il ya encore des lignes dans le tableau associatif $select  
while ($donnees = $select->fetch(PDO::FETCH_ASSOC)) 
{ 
    echo "<option value='".$donnees['code_e']."'>".$donnees['nom']."</option>"; 
   
} 
echo"</select></td></tr>"; 
echo"<tr><td colspan='2'><input type='submit' value='sauvgarder'><input type='reset' value='Annuler'></td></tr></table>";
//tester si code existe 
if(isset($_POST['code']))
{
    //recupérer les valeurs des champs du formulaire
	$code = $_POST["code"] ;
	$titre= $_POST["titre"] ;
	$auteur= $_POST["auteur"] ;
	$prix= $_POST["prix"] ;
	$editeur=$_POST["editeur"];
    //exécuter la requette d'insertion, si le resultat egal 1 cad une requette est insèrrée avec succè
    $nombreDeLigne =$connexion->exec("INSERT  INTO livres (code_l, titre, auteur, prix,code_e) VALUES ( '$code','$titre','$auteur',$prix,'$editeur') " );
if($nombreDeLigne ==1)
{
    //tester avec javascript si la requette est excuté avec succè et faire une redirection vers listeLivres.php
echo "<script language='javascript'>
function valid()
{
alert ('Insertion efectuée avec succès');
window.location = 'listeLivres.php';
}
valid();
</script>" ;
} 
}
?>
</form>
</body>
</html>