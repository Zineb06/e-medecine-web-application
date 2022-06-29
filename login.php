<?php
//connexion a la BD: 

 $conx = mysqli_connect("localhost","root","","masante");
if($conx==false)
{
    die("Connection echouee! ".$conx-> connect_error); 
}

 //validation:

$username=$_POST["username"];
$pwd=$_POST["pwd"];
$type=$_POST["type"];

//...

//Login:
if($type=="patient"){
	$requete = "select * from patient where username='$username' and pwd='$pwd'" ;
		$res = mysqli_query($conx,$requete);
		$row= mysqli_fetch_array($res);

		if(mysqli_num_rows($res)>0){
		   	        session_start();
	                $_SESSION['pat_username'] = $row['username'];
	                $_SESSION['pat_pwd'] = $row['pwd'];
	                $_SESSION['pat_id'] =$row['cin'];
	                $_SESSION['pat_login'] =true;

                    $status="en ligne"; $cin=$row['cin'];
              $req2=" update patient set status='$status' where cin='$cin' ";
              $res2=mysqli_query($conx,$req2);      

		   	        header("Location:patient/index.php");
		   	  
	    }else{ 
	    	  echo "n existe pas";
	 	      header("Location: Login_form.html");
	 	      exit();
           }	  
 }

 if($type=="medecin"){
	$requete = "select * from medecin where username='$username' and pwd='$pwd'" ;
		$res = mysqli_query($conx,$requete);
		$row= mysqli_fetch_array($res);

		if(mysqli_num_rows($res)>0){
		   	        session_start();
	                $_SESSION['inp'] = $row['inp'];
	                $_SESSION['nom_complet']=$row['nom_complet'];
	                $_SESSION['med_login'] =true;
	                
	                 $status="en ligne"; $inp=$row['inp'];
              $req2=" update medecin set status='$status' where inp='$inp' ";
              $res2=mysqli_query($conx,$req2);  

		   	        header("Location:medecin/index.php");
		   	  
	    }else{
	 	      header("Location:Login_form.html");
	 	      exit();
             }	  
 }
if($type=="admin"){
	$requete = "select * from admin where username='$username' and pwd='$pwd'" ;
		$res = mysqli_query($conx,$requete);
		$row= mysqli_fetch_array($res);

		if(mysqli_num_rows($res)>0){
		   	        session_start();
	                $_SESSION['ad_username'] = $row['username'];
	                $_SESSION['ad_pwd'] = $row['pwd'];
	                $_SESSION['ad_id'] =$row['id'];
	                $_SESSION['ad_login'] =true;
		   	        header("Location:admin/index.php");
		   	  
	    }else{
	 	      header("Location: Login_form.html");
	 	      exit();
             }	  
 }

?>