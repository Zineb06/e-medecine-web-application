<!DOCTYPE html> 
<html> 
<head>
  <title>Prendre Un Rendez-Vous</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../login_form.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="../js/style.css">
   <style type="text/css">
     .img-left{ background: none;  background-size: cover; }
     .container{ position: absolute; left: 15%; top:8% ; font-size: 18px; }
     #input{ background: #ddd; color:gray; border:1px solid gray;}
     #particles-js{background: #1b4d3e; height: 100vh;}
   </style>
</head>
<body >
  <div id="particles-js">


<?php 
session_start();
include "../connexion.php";
$pat_id=$_SESSION['pat_id'];
 $inp=$_GET['inp'];
if(!isset($pat_id)){
    header('location:../Login_form.html');
}
if(isset($_POST["submit"])){ 
    $pat_id=$_SESSION['pat_id'];
 $inp=$_GET['inp'];
     $date=$_POST["date-rdv"];
     $horaire=$_POST["horaire"];
     $etat="en demande";
     $etat2="confirmé";
     $req="select date_rdv, temps from rdv r, valabilite v where r.inp=v.inp and date_rdv='$date' and temps='$horaire' and etat='$etat2' ";
     $res=mysqli_query($conx,$req);
     $row=mysqli_fetch_array($res);
     if (mysqli_num_rows($res) > 0) {    
      ?>
        
        <div class="alert alert-danger" role="alert" id="alert"><center><b style="font-size:20px;">Date Occupée!</b></center>
            </div>       
<?php }
     else{
            $stmt = $conx->prepare("insert into rdv(cin, inp, date_rdv, temps, etat) values(?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss",$pat_id,$inp,$date,$horaire,$etat);
           if($stmt->execute()==true){
            // header("location:list-rdv.php");
                $stmt->close();
                $conx->close();
?>
                     <div class="alert alert-success" role="alert" id="alert"><center><b style="font-size:20px;">Demande Envoyée !</b><a href="list-rdv.php">Liste Des Rendez-Vous</a></center>
                      </div> 
                    <!-- <div class="alert"><script>alert("Demande Envoyée!");</script>  -->
                <?php
            }
        }
}
?>
<?php 
include "../connexion.php";
$pat_id=$_SESSION['pat_id'];
 $inp=$_GET['inp'];
if(!isset($pat_id)){
    header('location:../Login_form.html');
}
$requete = "select * from patient where cin='$pat_id' ";
$res = mysqli_query($conx,$requete);
$row= mysqli_fetch_array($res);

$req="select v.*, m.* from valabilite v, medecin m where m.inp=v.inp and v.inp='$inp' ";
$res2=mysqli_query($conx,$req);

$req3="select  * from  medecin  where inp='$inp' ";
$res3=mysqli_query($conx,$req3);
$row3=mysqli_fetch_array($res3);
?>


  <div class="container" >
   <a href="list-medecins.php"><button  type="button" class="btn btn-success" style="box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.5);">Médecins </button></a>
    <div class="row px-3">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
  
        <div class="col"></div>

        <div class="img-left d-none d-md-flex"> 
           <img src="../image/img-1.png"  width="500" height="500" style="margin-top: 10%; margin-left:-10%;" id="img" >
        </div>
        <div class="col"></div>

        <div class="card-body"> 
          <h4 class="title text-center mt-4">
          Prendre un Rendez-Vous avec Dr.<b style="color:#16a085"> <?php echo $row3['nom_complet']; ?></b>
          </h4>
          <form action="" method="POST" class="form-box px-3">

            <div class="form-input" >
              <input type="text" name="nom" placeholder="Nom.." value="<?php echo $row['nom'].' '.$row['prenom']; ?>"  readonly id="input">
            </div>

           

           <div class="form-input">
               <input type="text" name="genre" placeholder="Genre.." value="<?php echo $row['genre']; ?>"  readonly id="input"> 
            </div>

            <div class="form-input" style="display: inline-block;">
               <input type="text" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" required id="input">
            </div>

           
             <div class="form-input" >
                 <input type="text" name="date-rdv" placeholder="jj-mm-aaaa"  required style="border-color:springgreen">
            </div>

            <div class="mb-3">
              <div class="form-input">
                 <select name="horaire" required style="border-color:springgreen">
                    <option disabled>Choisir un horaire</option>
                    <?php while($row2=mysqli_fetch_array($res2)){?>
                        <option><?php echo $row2['temps_valable']; ?> </option>
                   <?php } ?>
              </select>
              </div>
            </div>

            <div class="mb-3">
              <button type="submit"  name="submit" class="btn btn-block text-uppercase">
                Envoyer
              </button>
            </div>

           
            <hr class="my-4">

            <!-- <div class="text-center mb-2">
              Pas encore un membre?
              <a href="signup.html" class="register-link">
                S'inscrire ici
              </a>
            </div> -->
          </form>
        </div>
      </div>
    </div>
  </div>


</div>


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
<script>
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow");
    });
</script>

<script src="../js/script.js"></script>
<script type="text/javascript" src="../js/particles.js"></script>
<script type="text/javascript" src="../js/app.js"></script>


</body>
</html>

