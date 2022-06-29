<?php
 session_start();
include "../connexion.php";
if($_SESSION['pat_login']==true){
    $cin=$_SESSION['pat_id'];
    $status="hors ligne";
    $req="update patient set status='$status' where cin='$cin' ";
    $res=mysqli_query($conx,$req);
}

if($_SESSION['med_login']==true){
    $inp=$_SESSION['inp'];
    $status="hors ligne";
    $req="update medecin set status='$status' where inp='$inp' ";
    $res=mysqli_query($conx,$req);
}


 session_destroy();
 header("location:../Login_form.html");
?>