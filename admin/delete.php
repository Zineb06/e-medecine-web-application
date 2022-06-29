<?php 
include 'connexion.php';
if(isset($_GET['inp'])){
    $inp=$_GET['inp'];

    $sql="delete from medecin where inp=$inp";
    $result=mysqli_query($conx,$sql);
    if($result){
        header('location:med.php');
        //echo "Deleted successfully"; 
    }else{ 
        die(mysqli_error($conx));
    }


}


?>