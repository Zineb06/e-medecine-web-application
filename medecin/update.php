<?php 

include "../connexion.php";
session_start();
$inp=$_SESSION['inp'];

if(!isset($inp)){
	header('location:../Login_form.html');
}

$email=$_POST['email'];
$adresse=$_POST['adresse'];
$tel=$_POST['tel'];
$username=$_POST['username'];
$pwd=$_POST['pwd'];

$sql1="select * from patient where email='$email' and inp != '$inp'";

        $res=mysqli_query($conx,$sql1);
        $count=mysqli_num_rows($res);
        if($count==1){
           echo 'Email Existe Deja';
        }
        else{
        
            $sql="update medecin set email='$email', tel='$tel', adresse='$adresse', username='$username'  WHERE inp='$inp'";
       
            $res=mysqli_query($conx,$sql);
            if($res){
                header("Location:profil.php");
             
            }else echo "<h2> ERREUR : NON MODIFIE!!!!!</h2>";
        }

?> 