
<?php
session_start();
include "../connexion.php";

 $date   = date('d-m-y');
 $time   = date("H:i");

$cin=$_POST['cin'];
$inp=$_POST['inp'];
// $src=$_POST["src"];
// $dest=$_POST["dest"];
$msg=$_POST['msg'];
$output="";

        ///include 'db.php';
          $sql="INSERT INTO messages(inp,cin,src,dest,msg,date_msg,temps_msg) values('$inp','$cin','$inp','$cin','$msg', '$date', '$time')";
          $query=mysqli_query($conx,$sql);

          if($query){
          	$output.="";
          	header("location:chatbox.php?cin=$cin");
          }
          else{
          	$output.="Error! Réssayer";
          }
          echo $output;

?>