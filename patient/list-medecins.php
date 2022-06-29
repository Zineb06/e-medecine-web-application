<?php 
include '../connexion.php';
session_start();
$requete= "select inp,nom_complet, specialite, img from medecin ";
$res = mysqli_query($conx,$requete);
// $row= mysqli_fetch_assoc($res);

if(mysqli_num_rows($res)>0){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Des Médecins</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <link rel="stylesheet" href="../medecin/assets/bootstrap/css/bootstrap.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../style.css">
    <style>
        section{width:100%;  }
    	.doctors{
    		position: absolute;
    		top:0;
    		width:100%;
    		right: 0;
    	}
    	.doctors .box-container{
           display:grid;
           grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
           gap:2rem;
         }
         .doctors .box-container .box{ height: 70vmin; position: relative;}
          .btn-med{
                   
                    display:inline-flex;
                    height: 10vmin;
                    width: 12vmin;
                    margin:2px;
                    margin-top: 3rem;
                    border-radius: .5rem;
                    background-color:lightgreen;
                    border: 2px solid #16a085;
                    color: #000;
                    cursor: pointer;
                    text-decoration: none;
                     font-family: 'Poppins', sans-serif;
                     font-size: 12px;
                     text-align: center;
                     padding: 4px;
                }
                .btn-med:hover{
                	background-color: springgreen;
                	color: #fff;
                    box-shadow:.5rem .5rem 0 rgba(22, 160, 133, .5);
                }
                .btn{ width: 30vh; } .btn:hover{ width:33vh; }
              
    </style>

</head>
<body>
    <a href="list-rdv.php"><button  type="button" class="btn btn-success">Mes Rendez-Vous </button></a>
<section class="doctors" id="doctors">
	<div class="search">
       <!--  <h1 class="chercher">Trouver<span>Un Médecin</span></h1> -->
        <form action="search_med.php" method="POST" class="search-form" >
            <input type="text" name="search" placeholder="Search.." >
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
     </div>
<h1 class="heading"> Nos <span>Médecins</span> </h1>

    <div class="box-container">
<?php  while($row=mysqli_fetch_array($res)){ ?>
	    <div class="flip">
            <div class="box">
            	<div class="box-front">
		            <img src=" <?php echo $row['img']; ?>" alt="">
		            <h3><?php echo $row['nom_complet']; ?></h3>
		            <span><?php echo $row['specialite']; ?></span>
		        </div>
	            <div class="box-back">
                    <a href="rdv-form.php?inp=<?php echo $row['inp']; ?>" class="btn-med">Prendre Un RDV</a>
                    <a href="chatbox.php?inp=<?php echo $row['inp']; ?>" class="btn-med">Contacter</a>
                     <a href="med-profil.php?inp=<?php echo $row['inp']; ?>" class="btn-med">Voir Profile</a>
	            </div>
            </div>
        </div>

        
<?php } ?>
        
    </div>
   </section>
</body>
</html>

<?php 
  }
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