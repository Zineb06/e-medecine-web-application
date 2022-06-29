<?php
session_start();
$cin=$_GET['cin'];
include '../connexion.php';
$id=$_GET['id'];
$req="delete from messages where id='$id' ";
$res=mysqli_query($conx,$req);
header("location:chatbox.php?cin=$cin");  
?>