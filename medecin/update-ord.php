 <?php 
include "../connexion.php";
session_start();
$inp=$_SESSION['inp'];
$ido=$_POST['ido']; 
$id=$_POST['id'];

$presc=$_POST['presc'];
$dose=$_POST['dose'];
$freq=$_POST['freq'];
$duree=$_POST['duree'];

            $sql="update ord set id='$id' , presc='$presc', dose='$dose', frequence='$freq', duree='
            $duree' WHERE ido='$ido' ";
       
            $res=mysqli_query($conx,$sql);
            if($res){
               header("location:ord.php?id=$id ");
             
            }else echo "<h2> ERREUR : NON MODIFIE!!!!!</h2>";

?> 