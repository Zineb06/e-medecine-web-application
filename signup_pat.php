<?php

include "connexion.php";

$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$dateN=$_POST["dateN"];
$genre=$_POST["genre"];
$cin=$_POST["cin"];
$nss=$_POST["nss"];
$email=$_POST["email"];
$adresse=$_POST["adresse"];
$tel=$_POST["tel"];
$username=$_POST["username"];
$pwd=$_POST["pwd"];
$tof="../image/user.png";

$stmt = $conx->prepare("insert into patient(cin,nom,prenom,daten,genre,nss,email,tel,adresse,username,pwd,tof) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssssssss",$cin,$nom, $prenom, $dateN, $genre, $nss, $email, $tel, $adresse, $username, $pwd, $tof);
if($stmt->execute()==true){
	header("Location:Login_form.html");
	$stmt->close();
	$conx->close();
}
else echo "<h2>non Inscrit</h2>";
?>