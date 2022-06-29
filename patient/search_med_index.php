<?php 
include '../connexion.php';

$search_name=$_POST["search"];
$requete= "select * from medecin where nom_complet='$search_name' ";
$res = mysqli_query($conx,$requete);
$row= mysqli_fetch_assoc($res);

if(mysqli_num_rows($res)>0){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Médecins</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../style.css">
    <style>
    	.doctors{
    		position: absolute;
    		top: 0;
    		width: calc(100% - 250px);
    		right: 0;
    		top: -20%;
    	}
    	.doctors .box-container{
           display: flex;
           justify-content: center;
           
         }
         .doctors .box-container .box{ height: 60vmin; }
         .flip {
                  background-color: transparent;
                  width: 300px;
                  height: 200px;
                  border: 1px solid #f1f1f1;
                  perspective: 1000px;
                }
          .box{
                  position: relative;
                  
                  transition: transform 800ms;
                  transform-style: preserve-3d;
                }
        .flip:hover .box{
                  transform: rotateY(180deg);
                }
            .box-front, .box-back {
                  position: absolute;
                  width: 100%;
                  height: 100%;
                  -webkit-backface-visibility: hidden;
                  backface-visibility: hidden;
                }  

              .box-back{
                  background-color:lightgreen;
                  top: 1%;
                  left: 1%;
                  transform: rotateY(180deg);
                  align-items: center;
                }
                .btn-med{
                    display:block;
                    height: 10vmin;
                    width: 30vmin;
                    margin:4vmin;
                    float: center;
                    border-radius: .5rem;
                    background-color: #16a085;
                    border: 2px solid #fff;
                    color: #fff;
                    cursor: pointer;
                    text-decoration: none;
                    margin-left: 20%;
                     font-family: 'Poppins', sans-serif;
                     font-size: 20px;
                }
                .btn-med:hover{
                    box-shadow:.5rem .5rem 0 rgba(22, 160, 133, .5); ;
                }


    </style>

</head>
<body>
<section class="doctors" id="doctors">
	<div class="search">
        <h1 class="chercher" style="margin-left:-30px;">Trouver<span>Un Médecin</span></h1>
        <form class="search-form" action="search_med.php">
            <input type="text" value="<?php echo $search_name ?>" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
     </div>
<h1 class="heading"> Résultats </h1>

    <div class="box-container">
        <div class="flip">
            <div class="box">

                <div class="box-front">
                      <img src=" <?php echo $row['img']; ?>" alt="">
                      <h3><?php echo $row['nom_complet']; ?></h3>
                      <span><?php echo $row['specialite']; ?></span>
                </div>

                <div class="box-back" style="padding:10px; padding-top: 30px;"> <h4 style="font-size: 16px; font-weight: normal;">
                    <p><b><center style="color: green;">Description : </center></b></p>
                    <p><?php echo $row['desc']; ?></p><br><br>
                    <p><i class="fa fa-phone">&nbsp<?php echo $row['tel']; ?></i></p>
                    <br>
                     <p><i class="fa fa-envelope">&nbsp<?php echo $row['email']; ?></i></p>
                     <br>
                      <p><i class="fa fa-home">&nbsp<?php echo $row['adresse']; ?></i></p>
                      <br>
                </div></h4>
            </div>
        </div>
    </div>
   </section>
</body>
</html>

<?php 
  }else{ header("location:notfound-index.html");}
 ?>

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