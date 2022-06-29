<?php 
include "../connexion.php";
session_start();
$inp=$_SESSION['inp'];
$cin=$_POST["cin"];
    $id=$_POST['id'];
     $presc=$_POST["presc"];
     $dose=$_POST["dose"];
     $freq=$_POST["freq"];
     $duree=$_POST["duree"];
     
     
            $req3="insert into ord(id, inp, cin, presc, dose, frequence, duree) values('$id', '$inp', '$cin', '$presc', '$dose', '$freq', '$duree')";
            $res3=mysqli_query($conx,$req3);
           if($res3==true){
                $conx->close();
                header("location:ord.php?id=$id");
                ?>
                  <!--   <b class="alert alert-success" role="alert" id="alert">Ordonnance Ajoutée!</b> -->
<?php
               
            }
?>