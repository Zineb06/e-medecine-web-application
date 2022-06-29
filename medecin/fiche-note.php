<?php  
include "../connexion.php";
session_start();
$inp=$_SESSION['inp'];
$nom=$_SESSION['nom_complet'];
$cin=$_GET['cin'];
if(!isset($inp)){
    header('location:../Login_form.html');
}
$req="select * from  patient   where cin='$cin' ";
$res=mysqli_query($conx,$req);
$row=mysqli_fetch_array($res);

$req2="select * from  fiche f   where cin='$cin' ";
$res2=mysqli_query($conx,$req2);
$row2=mysqli_fetch_array($res2);

?>
<!DOCTYPE html> 
<html>

<head>
  <title>Appointment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="rdv.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <style>
    #alerte{position: relative; top:5%; }
    #btn{position: absolute; top:5%; }
  </style>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>

<body>
  <div class="container">
      <a href="patient.php"><button button type="button" class="btn btn-primary" id="btn">Retour Aux Patients</button></a>
    <div class="row px-3">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
        <div class="img-left d-none d-md-flex"></div>
        <div class="card-body ">
          <h4 class="title text-center mt-3"><div class="shadow-lg p-2 mb-2 bg-body rounded"><b><i>Rapport D'état </i></b></div>
          </h4>
 <?php if($row2['note']==null){ ?>
          <form method="POST"  class="form-box px-3">
 <?php }  if($row2['note'] !=null){ ?>  
             <form method="POST"  class="form-box px-3">
 <?php } ?>             
              <div class="row">
                  <div class="col">
                      <label for="exampleInputPassword1">Nom </label>
                    <input type="text" class="form-control" placeholder="<?php echo $row['nom']; ?>" readonly>
                  </div>
                  <div class="col">
                      <label for="exampleInputPassword1"> Prenom </label>
                    <input type="text" class="form-control" placeholder="<?php echo $row['prenom']; ?>" readonly>
                  </div>
              </div>
              <div class="row">
                  <div class="col">
                      <label for="exampleInputPassword1">Genre</label>
                    <input type="text" class="form-control" placeholder="<?php echo $row['genre'];?>" readonly>
                  </div>
                  <div class="col">
                      <label for="exampleInputPassword1">Date De Naissance</label>
                    <input type="text" class="form-control" placeholder="<?php echo $row['daten'];?>" readonly>
                  </div>
              </div>
              <div class="row">
                 <div class="col">
                      <label for="exampleInputPassword1" style="color: green;"><b>Note Du Médecin</b></label>
                    <input type="text" class="form-control" value="<?php echo $row2['note'];?>" name="note">
                     <input type="hidden" class="form-control" value="<?php echo $cin;?>" name="cin">
                      <input type="hidden" class="form-control" value="<?php echo $inp;?>" name="inp">
                  </div>
              </div>
              <br>
              <?php if($row2['note']==null){ ?>
              <input type="submit" class="btn btn-success" value="Submit" name="submit">
            <?php 

              if(isset($_POST["submit"])){ 
                  $cin=$_GET['cin'];
                   $note=$_POST["note"];
                   
                          $req3="insert into fiche( cin, inp,note) values( '$cin', '$inp','$note')";
                          $res3=mysqli_query($conx,$req3);
                         if($res3==true){
                              $conx->close();
                              header("location:fiche-note.php?cin=$cin");
                              ?>
                                  <b class="alert alert-success" role="alert" id="alert">Note Ajoutée!</b>

                                <?php   
                                            }
                                 }

              } ?><!-- fin if -->

                       <?php if($row2['note']!=null){ ?>
              <input type="submit" class="btn btn-warning" value="Modifier" name="submit">
            <?php 

              if(isset($_POST["submit"])){ 
                  $cin=$_GET['cin'];
                   $note=$_POST['note'];
                   
                          $req3="update fiche set note='$note' where cin='$cin' ";
                          $res3=mysqli_query($conx,$req3);
                         if($res3==true){
                              $conx->close(); header("location:fiche-note.php?cin=$cin");?>
                                  <b class="alert alert-success" role="alert" id="alert">Note Modifiée!</b>

                                <?php   
                                            }
                                 }

              } ?><!-- fin if -->

                      
          </form>
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