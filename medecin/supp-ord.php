<?php
include "../connexion.php";
$ido=$_GET['ido']; 
$id=$_GET['id'];
$req="delete from ord where ido='$ido' ";
$res=mysqli_query($conx,$req);
header("location:ord.php?id=$id ");
?> 