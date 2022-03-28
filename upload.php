<?php
include("dbhandler.php");
echo $_FILES['maphoto']['name']."<br>";
echo $_FILES['maphoto']['tmp_name']."<br>";
$uploadDir = "/xampp/htdocs/minprojet-suivisserie-team1/image/serie/";
$uploadFile = $uploadDir .
basename($_FILES['maphoto']['name']);
if(move_uploaded_file($_FILES['maphoto']['tmp_name'],
$uploadFile)) {
 echo "Fichier Valide et téléchargé avec succès"."<br>";
 } else {
 echo "Echec dans le téléchargement ou le rapatriement du fichier."."<br>";
 }
 $image = "image/serie/".$_FILES['maphoto']['name'];
if(addNewSerie($_POST['nom_serie'],$_POST['nbepisode'],$_POST['nbsaison'],$_POST['etat_serie'],$image,$_POST['annee_sortie']) == 1){
    //Ajout reussis
    header("Location: index.php");
}
else{
    //ajout echouer
}
 echo $_POST['nom_serie']."<br>";
 echo $_POST['nbsaison']."<br>";
 echo $_POST['nbepisode']."<br>";
 echo $_POST['date_sortie']."<br>";
 echo $_POST['etat_serie']."<br>";
?>