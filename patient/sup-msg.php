<?php
session_start();
$inp=$_GET['inp'];
include '../connexion.php';
$id=$_GET['id']; 
$req="delete from messages where id='$id' ";
$res=mysqli_query($conx,$req);
header("location:chatbox.php?inp=$inp"); 
?>