
<?php
include "../connexion.php";
$etat="annulé";
$id=$_GET['id'];
$req="update rdv set etat='$etat' where id='$id' ";
$res=mysqli_query($conx,$req);
header("location:list-rdv.php");
?> 