<?php 

include "../connexion.php";
session_start();
$cin=$_SESSION['pat_id'];

if(!isset($cin)){
	header('location:../Login_form.html');
}

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$dateN=$_POST['dateN'];
$genre=$_POST['genre'];
$nss=$_POST['nss'];
$email=$_POST['email'];
$adresse=$_POST['adresse'];
$tel=$_POST['tel'];
$username=$_POST['username'];
$pwd=$_POST['pwd'];

$sql="select * from patient where email='$email' and cin != '$cin'";
$sql="select * from patient where username='$username' and cin != '$cin'";
        $res=mysqli_query($conx,$sql);
        $count=mysqli_num_rows($res);
        if($count==1){
           echo 'Email Existe Deja';
          }
          else{
        if($_POST['pwd']){
        $password=md5($_POST['pwd']);
        $sql="update patient set nom='$nom', prenom='$prenom', daten='$dateN', genre='$genre', nss='$nss', email='$email', tel='$tel', adresse='$adresse', username='$username', pwd='$pwd'   WHERE cin='$cin'";

        }
        else{
            $sql="update patient set nom='$nom', prenom='$prenom', daten='$dateN', genre='$genre', nss='$nss', email='$email', tel='$tel', adresse='$adresse', username='$username'  WHERE cin='$cin'";
        }
        $res=mysqli_query($conx,$sql);
        if($res){
            echo 'Profile Updated Successfully';
            header("Location:profil-form.php");
         
        }else echo "<h2> NON MODIFIE!!!!!</h2>";
      }

?> 