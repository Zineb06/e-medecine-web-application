<?php 
include 'connexion.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="delete from specialite where id=$id";
    $result=mysqli_query($conx,$sql);
    if($result){
        header('location:spec.php');
        //echo "Deleted successfully"; 
    }else{
        die(mysqli_error($conx));
    } 


}


?>