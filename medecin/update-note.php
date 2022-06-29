<?php 
include "../connexion.php";
session_start();
$inp=$_SESSION['inp'];
// $id=$_GET['id'];
$cin=$_GET['cin'];
if(!isset($inp)){
	header('location:../Login_form.html');
}

$note=$_GET['note'];

            $sql="update fiche set note='$note' WHERE cin='$cin' ";
       
            $res=mysqli_query($conx,$sql);
            if($res){
                header("Location:fiche-note.php?cin=$cin");
             
            }else echo "<h2> ERREUR : NON MODIFIE!!!!!</h2>";

?>