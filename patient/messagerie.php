<?php
 error_reporting(0); 
  include '../connexion.php';
  session_start();
  if(!$_SESSION['pat_login']){
    header('location:../Login_form.html');
} 
  $pat_id=$_SESSION['pat_id']; 
?>

<?php
$req2="select * from medecin  ";
$res2=mysqli_query($conx,$req2);
// $row2=mysqli_fetch_assoc($res2);

         
          $sql1="select * from patient where  cin='$pat_id' ";
          $query1=mysqli_query($conx,$sql1);
          $info=mysqli_fetch_array($query1);       
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="messagerie.css">
	<style>
	
	</style>
	<title></title>
</head>
<body>
	<div class="container">
		<div class="sidebar">
			<a href="profil-form.php" style="text-decoration:none">
			<div class="profile">
				<div class="profile-img">
					<img src="<?php echo $info['tof'];?>">

					<?php if($info['status']=="en ligne"){ ?>
					<i class="fa fa-circle" id="on3"></i>
					<?php } if($info['status']=="hors ligne"){ ?>
					<i class="fa fa-circle" id="off3"></i>
				<?php } ?>

				</div>
				<div class="profile-data">
					<h3><?php echo $info['nom'].' '.$info['prenom'];?></h3>
					<span><?php echo $info['status'];?></span>
				</div>
			</div></a>


			<div class="messages">
				<h3 class="title">Médecins </h3>

		<?php while($row2=mysqli_fetch_array($res2)){ ?>
			<a href="chatbox.php?inp=<?php echo $row2['inp'];?>">
				<div class="recents">
					<div class="recent-img">
						<img src="<?php echo $row2['img'];?>">

						<?php if($row2['status']=="en ligne"){ ?>
					<i class="fa fa-circle" id="on"></i>
					<?php } if($row2['status']=="hors ligne"){ ?>
					<i class="fa fa-circle offline" id="off"></i>
				<?php } ?>

					</div>
					<div class="recent-data">
						<h3><?php echo $row2['nom_complet'];?></h3>
						<span><?php echo $row2['status'];?></span>
					</div>
				</div></a>
		<?php } ?>

			</div>
		</div>

		<!-- message box -->
		<div class="message-box">
			<div class="box-top">
				<div class="recents">
					<div class="recent-img">
						<img src="<?php echo $info['tof'];?>">

							<?php if($info['status']=="en ligne"){ ?>
					<i class="fa fa-circle" id="on2"></i>
					<?php } if($info['status']=="hors ligne"){ ?>
					<i class="fa fa-circle" id="off2"></i>
				<?php } ?>

					</div>
					<div class="recent-data">
						<h3><?php echo $info['nom'].' '.$info['prenom'];?></h3>
						<span><?php echo $info['status'];?></span>
					</div>
				</div><!-- fin recent -->

				<div class="call-actions">
					<div class="action-icons">
						<i class="fa fa-video-camera"></i>
						<i class="fa fa-image"></i>
					</div>
				</div>
			</div><!-- fin box top -->

			<!-- chat box -->

			<div class="box">
				

					<div class="welcome-img">
						<img src="../image/book-img.svg">
					</div>
					<h2 class="h2">Prendre<i>Contact</i> avec Un Médecin</h2>

					
			      <!-- input box -->
			      			
			      <!-- contact box -->
			      	

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