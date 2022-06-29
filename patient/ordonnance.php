<?php 
session_start();
$pat_id=$_SESSION['pat_id'];
$id=$_GET['id']; 
include "../connexion.php";
$req="select m.*, p.*, r.* from medecin m, patient p,rdv r where p.cin=r.cin and m.inp=r.inp and r.id='$id' ";

$req2="select o.* , r.*  from rdv r, ord o where r.id='$id'
       and r.id=o.id "; 
$sql="select m.*, r.* from medecin m, rdv r where r.inp=m.inp and r.id='$id' ";
$rs=mysqli_query($conx,$sql);
$info=mysqli_fetch_array($rs);


$res2=mysqli_query($conx,$req2);
// $row2=mysqli_fetch_array($res2);

$res=mysqli_query($conx,$req);
$row=mysqli_fetch_array($res);
if(mysqli_num_rows($res)>0){ 
?>


<?php
include "../qr-code/phpqrcode/qrlib.php";
$location='../qr-code/images/'.rand().'png';
$str=rand();
$result = md5($str);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Ordonnance médicale</title>
    <style>
        @media print{
            #btntxt{ visibility: hidden; }
            body *:not(#container):not(#container *){
                visibility: hidden;
            }
            #container{
                position: absolute;
                top: 0;
                left: 0;
            }

        }
        th,td{ margin: 2rem; padding: 2rem; }
       *{ text-transform: capitalize; }
    </style>
</head>
<body>  
     <button onclick="printFunction()" class="btn btn-primary " id="btntxt" style="margin-top:12px; margin-left: 5px;"> Télécharger </button>
        
        <div class="container" id="container">
       
            
            <div class="row" style="margin:2rem">
                <div class="col" style="font-size:22px;">
                  <div class="mb-3">
                     <span> <?php echo $row['nom_complet']; ?></span><br>
                  </div>   
                   <div class="mb-3">
                    <span><?php echo $row['specialite']; ?></span><br>
                   </div>  
                    <div class="mb-3">
                         <span style="color:#16a085"> INP :</span> <?php echo $row['inp']; ?><br>
                    </div>  
                    
                   
                </div>
                 
                  <div class="col"><img src="../image/ord-logo.png" height="140vmin" width="170vmin" ></div>
                 
                 <div class="col"  style="font-size:19px;"><i>
                    <?php echo $row['desc']; ?><br>
                    
                 </div></i>
           <!--  <hr style="border:1px solid #1b4d3e; width:600px;"> -->
            </div>
            
            <div class="card-body">
                <div class="row my-4"></div>
                <div class="row">
                    <div class="col text-center" >
                    ...............................................................  Le :<b> <?php echo $row['date_rdv']; ?> </b>...........................................................
                   </div>
                   <div class="row my-4"></div>
                   <div class="row my-4"></div>
                   <div class="row my-4"></div>
                </div>
                <div class="row my-4"> <!-- CIN -->
                    <div class="col text-left ">
                        <h6 class="card-title"><b style="color:#16a085">Nom Du Patient : </b><?php echo $row['prenom'].'  '.$row['nom']; ?>
                    </h6>
                        <br>
                        <h6 class="card-title">
                            <b style="color:#16a085">Date De Naissance : </b><?php echo $row['daten']; ?>
                        </h6>
                        <br>
                        <h6 class="card-title"><b style="color:#16a085">NSS : </b><?php echo $row['nss']; ?>
                    </h6>
                    </div>
                     <div class="col text-left ">
                         <h5>
                            <?php while($row2=mysqli_fetch_array($res2)){ ?>
                           <tr>
                            <?php echo $row2['presc'].'  '.$row2['dose'].'  '.
                            $row2['frequence'].'  '.$row2['duree']; ?><br><br>
                            <br>
                           </tr>
                       <?php } ?>
                         </h5>
                     </div>
                </div>  
                <!-- fin row main -->
                <div class="row my-4"></div>
                <div class="row my-4"></div>
                <div class="row my-4"></div>
                <div class="row my-4">
                    <div class="col text-left"></div>
                    <div class="col text-center">
                        <?php
                        QRcode::png($result,$location);
                        ?>
                        <img src="<?php echo $location; ?>" height="150vmin" width="150vmin">
                    </div>
                    <div class="col text-right">
                        <img src="<?php echo $info['sign']; ?>" height="150vmin" width="150vmin">
                    </div>
                </div>  

                <footer class="text-center">
                <hr>
               
                <div class="social pt-3" >
                    <span class="pr-2" >
                        <i class="fas fa-mobile-alt" style="color:#16a085"></i>
                        <span><?php echo $info['tel']; ?></span>
                    </span>
                    <span class="pr-2">
                        <i class="fas fa-envelope" style="color:#16a085"></i>
                        <span><?php echo $info['email']; ?></span>
                    </span>

                    <span class="pr-2">
                        <i class="fa fa-home" aria-hidden="true" style="color:#16a085"></i>
                        <span><?php echo $info['adresse']; ?></span>
                    </span>
                </div>
            </footer>
                 
            </div>
        </div>
    </div class="my-4">
    <!-- <div class="row">
        <div class=" col text-center" id="btntxt"></div>
    </div> -->
    
    <?php } ?>
    <script>
      function printFunction() { 
        window.print(); 
      }
    </script>
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