<?php
include "../connexion.php";
session_start();
$pat_id=$_SESSION['pat_id'];
$inp=$_GET['inp'];
if(!isset($pat_id)){
    header('location:../Login_form.html');
}
 $requete = "select * from medecin where inp='$inp' ";
                     $res = mysqli_query($conx,$requete);
                     $row= mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile Du Médecin</title>
    <link rel="stylesheet" href="../medecin/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../medecin/assets/fonts/fontawesome-all.min.css">
    <style type="text/css">
       *{ text-transform: capitalize; } body{ background: #1b4d3e;}
        form .form-control, #address, #email, #tele, #bio{ border: none; outline: none; color:black; }
          #particles-js{background: #1b4d3e; height: 100%; width: 100%;}
  body{overflow-y: hidden;}
    </style>
</head>

<body>
<div id="particles-js">
<div class="container-fluid" style="margin-top:100px;">

                <div class="row mb-3"></div>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                             
                            <div class="card mb-3 ">
                            <form>
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4"
                                        src="<?php echo $row['img']; ?>" width="160" height="160">

                                </form> <h5>
                                <b> <div class="mb-3"> <div class="mb-3"></div>
                                <div class="row mb-3  text-dark" >
                                    <i class="fa fa-user">
                                    <?php echo $row['nom_complet'] ?></i>
                                </div>
                                <div class="mb-3"></div> 
                                 <div class="row mb-3  text-dark" >
                                     <i class="fa fa-info-circle" style="color:green;">
                                    <?php echo $row['specialite'] ?></i>
                                </div>
                               
                                <div class="mb-3"><h5>

                                    <button class="btn btn-success">
                                        <a href="chatbox.php?inp=<?php echo $row['inp'];?>" style="text-decoration: none; color:black;">Contacter</a>
                                    </button>
                                </h5></div>
                                  
                                 </div></b>  
                                </div>
                            </div>
                          <!-- < --></h5>
                            <!--   -->
                        </div>
                        <div class="col-lg-8">
                            

                <!-- inputs -->

                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3 ">
                                        <div class="card-header py-3">
                                            <p class="text-success m-0 fw-bold">Description :</p>
                                        </div>
                                        <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3 text-dark">
                                                            <?php echo $row['desc']; ?>
                                                        </div>
                                                    </div>

                                   

                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>


                                         <div class="card shadow mb-3" style="margin-bottom: 5%;">
                                <div class="card-header py-3">
                                    <p class="text-success m-0 fw-bold">Informations de contact</p>
                                </div>
                                <div class="card-body text-dark">
                                    
                                        <div class="row mb-3" >
                                            <i class="fa fa-home">
                                           <?php echo $row['adresse'] ?></i></div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="row mb-3">
                                                     <i class="fa fa-phone">
                                                    <?php echo $row['tel'] ?>
                                                </i>
                                                </div>
                                                <div class="col">
                                                    <div class="row mb-3">
                                                         <i class="fa fa-at">
                                                        <?php echo $row['email'] ?>
                                                    </i>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- <div class="mb-3"><button class="btn btn-success btn-sm"
                                                type="submit">Sauvegarder</button></div> -->
 
                                 </div>
                    
                             </div>
 

                                       <!--  <div class="mb-3 px-2"><button class="btn btn-success btn-sm"
                                                type="submit">Sauvegarder</button></div> -->
                                       
                                    
                              </div></div></div>
                         </div>  
            </div>
           
                </div>
            </div>
    </div></div>
</div>
</body>
 <script src="../medecin/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../medecin/assets/js/bs-init.js"></script>
    <script src="../medecin/assets/js/theme.js"></script>
    <script type="text/javascript" src="../js/particles.js"></script>
<script type="text/javascript" src="../js/app.js"></script>
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