<?php
include 'connexion.php';

$rq="select count(*) from medecin";
$rs=mysqli_query($conx,$rq);
$rw=mysqli_fetch_array($rs);

$rq2="select count(*) from patient";
$rs2=mysqli_query($conx,$rq2);
$rw2=mysqli_fetch_array($rs2);

$rq3="select count(*) from specialite";
$rs3=mysqli_query($conx,$rq3);
$rw3=mysqli_fetch_array($rs3);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
        <link rel="stylesheet" href="../medecin/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../medecin/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Gestion des spécialités</title>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h2 style="color:lightgreen;">
             <a href="#" style="color: lightgreen"> <i class="fa fa-heartbeat" aria-hidden="true"></i> <span>MaSanté</span></a> 
   </h2>
        </div>
        <ul>
            <a href="index.php" ><li><i class="fa fa-home" ></i>&nbsp; <span>Dashboard</span></li></a>
            <a href="med.php"><li><i class="fa fa-notes-medical"></i>&nbsp;<span>Médecins</span> </li></a>
            <a href="spec.php"><li id="active"><i class="fa fa-list"></i>&nbsp;<span>Spécialités</span></li></a>
            <a href="disp.php"><li><i class="fa fa-clock"></i>&nbsp;<span>Disponibilités</span> </li></a>
           <br><br><br><br>
            <a href="../patient/logout.php"><li><i class="fa fa-reply"></i>&nbsp;<span>Se Déconnecter</span> </li></a>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <h5 style="color:black">Espace<i style="color:green"> Admin</i></h5></span>
                <div class="search">
                    <input type="text" >
                    <button style="height:7vh"><i class="fa fa-search"></i></button>
                </div>
                <div class="user">
                    
                    <div>
                       admin admin 
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <!-- <div class="card" style="background-color: lightgreen;">
                    <div class="box" >
                        <h1><?php echo $rw['count(*)']; ?></h1>
                        <h3>Médecins</h3>
                    </div>
                    
                </div>
                <div class="card" style="background-color:#a3c1ad">
                    <div class="box">
                        <h1><?php echo $rw2['count(*)']; ?></h1>
                        <h3>Patients</h3>
                    </div>
                   
                </div>
                <div class="card" style="background-color:#679267">
                    <div class="box">
                        <h1><?php echo $rw3['count(*)']; ?></h1>
                        <h3>Spécialités</h3>
                    </div>
                    
                </div> -->
                
            </div>
            <div class="content-2">
                <div class="new-students">
                    <div class="title">
                        <h2>Liste Des Spécialités</h2>
                       <a href="specialite_form.php" class="btn btn-success">Ajouter
                        Spécialité </a>
                    </div>
                    <table>
                        <tr>
                            <th>Spécialité</th>
                             <th>Médecin Chef</th>
                            <th>inp</th>
                            <th>opérations</th>
                        </tr>

              <?php 
                             $sql="select m.*, s.* from specialite s, medecin m where m.inp=s.inp order by id desc";
                             $result=mysqli_query($conx,$sql);
                             if($result){
                                while($row=mysqli_fetch_assoc($result)){
                               
                                $nom=$row["nom"];
                                $inp=$row["inp"];
                                 $med=$row["nom_complet"];

                                echo' <tr>
                                
                                <td>'.$nom.'</td>
                                <td>'.$med.'</td>
                                <td>'.$inp.'</td>
                                <td>
                                   <button class="btn btn-danger "><a class="text-light" href="delete_specialite.php?id='.$row['id'].'"><i class="fa fa-trash"></i></a></button>
                               </td>
                                </tr>';
                            }}
                       


                         
                             
                             
                             ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


<div class="loader-wrapper">
    <img src="../gif/1.gif">
</div>
<style> 
  .loader-wrapper{
width: 100%;
height: 100%;
position: absolute;
top: 0;
left: 0;
bottom: 0; 
overflow: hidden;
background: #fff;
display: flex;
justify-content: center;
align-items: center;
}
  </style>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow");
    });
</script>