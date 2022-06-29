<?php 
include 'connexion.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="delete from valabilite where id=$id";
    $result=mysqli_query($conx,$sql);
    if($result){
        header('location:disp.php');
        //echo "Deleted successfully"; 
    }else{
        die(mysqli_error($conx));
    }
 

}


?>