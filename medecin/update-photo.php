<?php
include '../connexion.php';
session_start();
$inp=$_SESSION['inp'];

$name=$_FILES['image']['name'];
$temp=$_FILES['image']['tmp_name'];

// $exp=exp(".",$name);
// $end=end($exp);
// $nom=time().".".$end;

// if(!is_dir("../image")) {mkdir("image");}

$path="../image/".$name;
$allowed_ext=array("jpg","jpeg","png");

// if(in_array($end, $allowed_ext)){
	    move_uploaded_file($temp, $path);
		$req="update medecin set img='$path' where inp='$inp' ";
		$res=mysqli_query($conx,$req);
		header("location:profil.php");
// }	

?>