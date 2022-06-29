<?php
include "../connexion.php";
session_start();
$pat_id=$_SESSION['pat_id'];
$id=$_GET['id'];
$req="delete from rdv where id='$id' "; 
$res=mysqli_query($conx,$req);
// $row=mysqli_fetch_array($res);
if($res=true){ header("Location:list-rdv.php");}
?>