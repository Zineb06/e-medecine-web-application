<?php
include "../connexion.php";
$inp=$_SESSION['inp'];
$id=$_GET['id'];
$etat="confirmé";
$req="update rdv set etat='$etat' where id='$id' ";
$res=mysqli_query($conx,$req);
header("location:appointment.php");
?>