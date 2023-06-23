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
   
<form name="f" action="#" method="POST">
<h1>Liste des livres</h1>
<table border='0'>
<tr><td>Prix maximum</td>
<td><input type="text" name="prix"/></td></tr>
<tr><td>Editeur </td>
<td><select name="editeur">

<?php
//connexion
include("connexion.php");
//requette de selection pour remplir liste éditeurs
$select=$connexion->query('SELECT * FROM editeurs');
while ($donnees = $select->fetch(PDO::FETCH_ASSOC)) 
{ 
    echo "<option value='".$donnees['code_e']."'>".$donnees['nom']."</option>"; 
} 
echo"</select></td></tr>"; 
echo"<tr><td colspan='2'><input type='submit' value='afficher'></td></tr></table>";
//si prix existe
if(isset($_POST['prix']))
{
    //récupérer prix et code éditeurs
$prix=$_POST['prix'];
$code_e=$_POST['editeur'];

echo"<table border='2'>
		<th>Code livre</th><th>Titre</th><th>Auteur</th><th>Prix</th>";
//récupérer les informations des livres dont le prix et <$prix et le code=$code_e
$affiche=$connexion->query("select * from livres l, editeurs e where l.code_e='$code_e' and l.prix<='$prix' and l.code_e=e.code_e");
//afficher les informations recupérés sous forme d'un tableau 
while($val=$affiche->fetch(PDO::FETCH_ASSOC))
{
echo"<tr><td>".$val['code_l']."</td><td>".$val['titre']."</td><td>".$val['auteur']."</td><td>".$val['prix']."</td></tr>";
}
echo"</table>";
}
//lien pour ajouter un nouveau livre
echo "<a href='ajoutLivre.php'>Ajouter un nouveau livre</a>";
?>

</form>

</body>
</html>