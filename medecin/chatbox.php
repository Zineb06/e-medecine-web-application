<?php 
 error_reporting(0);
  include '../connexion.php';
  session_start();
  if(!$_SESSION['med_login']){ 
    header('location:../Login_form.html');
} 
  $inp=$_SESSION['inp'];
  $cin=$_GET['cin'];
?>
<?php  
//pour sidebar
$req2="select * from patient";
$res2=mysqli_query($conx,$req2);
// $row2=mysqli_fetch_assoc($res2);

$sql="select * from patient where cin='$cin' ";
$rsql=mysqli_query($conx,$sql);
$rw=mysqli_fetch_array($rsql);

//pour le profil         
$sql1="select * from medecin where  inp='$inp' ";
$query1=mysqli_query($conx,$sql1);
$info=mysqli_fetch_array($query1);  

//pour les msg
$req="select ms.*, p.* from messages ms, patient p where p.cin=ms.cin and  ms.cin='$cin' and ms.inp='$inp' order by id  ";
$res=mysqli_query($conx,$req);
// $row=mysqli_fetch_array($res);    
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="chatbox.css">
	<title>Contacter Un Patient</title>
	
</head>
<body>
	<div class="container">
		<div class="sidebar">
				<a href="profil.php" style="text-decoration:none">
			<div class="profile">
				<div class="profile-img">
					<img src="<?php echo $info['img']; ?>">

					<?php if($info['status']=="en ligne"){ ?>
					<i class="fa fa-circle" id="on3"></i>
					<?php } if($info['status']=="hors ligne"){ ?>
					<i class="fa fa-circle" id="off3"></i>
				<?php } ?>

				</div>
				<div class="profile-data">
					<h3><?php echo $info['nom_complet'];?></h3>
					<span><?php echo $info['status'];?></span>
				</div>
			</div></a>


			<div class="messages">
				<h3 class="title">Patients</h3><br>
		<?php while($row2=mysqli_fetch_array($res2)){ ?>
			<a href="chatbox.php?cin=<?php echo $row2['cin'];?>">
				<div class="recents">
					<div class="recent-img">
						<img src="<?php echo $row2['tof'];?>">

						<?php if($row2['status']=="en ligne"){ ?>
					<i class="fa fa-circle" id="on"></i>
					<?php } if($row2['status']=="hors ligne"){ ?>
					<i class="fa fa-circle offline" id="off"></i>
				<?php } ?>

					</div>
					<div class="recent-data">
						<h3><?php echo $row2['nom'].' '.$row2['prenom'];?></h3>
						<span><?php echo $row2['status'];?></span>
					</div>
				</div>
				</a>
		<?php } ?>		

			</div>
		</div>

		<!-- message box -->
		<div class="message-box">
			<div class="box-top">
				<div class="recents">
					<div class="recent-img">
						<img src="<?php echo $rw['tof'];?>">

							<?php if($rw['status']=="en ligne"){ ?>
					<i class="fa fa-circle" id="on2"></i>
					<?php } if($rw['status']=="hors ligne"){ ?>
					<i class="fa fa-circle offline" id="off2"></i>
				<?php } ?>
				

					</div>
					<div class="recent-data">
						<h3><?php echo $rw['nom'].' '.$rw['prenom']; ?></h3>
						<span><?php echo $rw['status'];?></span>
					</div>
				</div><!-- fin recent -->

				<div class="call-actions">
					<div class="action-icons">
						<a href="../video-chat/index.html"><i class="fa fa-video-camera"></i></a>
						<a href="#"><i class="fa fa-image"></i></a>
					</div>
				</div>
			</div><!-- fin box top -->

			<!-- chat box -->

	<div class="box" id="box">
			<?php
					 while ($row=mysqli_fetch_array($res)) {
           	          if($row['src'] == $cin){
           		?>	
				<div class="sender">
					<div class="recents">
						<div class="recent-img">
						<img src="<?php echo $rw['tof'];?>">
					    </div>
					    <div class="recent-data">
						<h3><?php echo $row['nom'].' '.$row['prenom']; ?><span class="time"><?php echo $row['date_msg'].', '. $row['temps_msg']; ?> </span></h3>
						<span>
							<?php echo $row['msg']; ?>
							<!-- <a href="sup-msg.php?id=<?php echo $row['id']; ?>&cin=<?php echo $cin; ?> ">
									<i class="fa fa-trash"></i>
								   </a> -->
							</span>
					    </div>
					</div>
				</div><!-- fin sender -->
			<?php }if($row['src'] == $inp){ ?>

				<div class="receiver">
				  <div class="recents">
					<div class="recent-data">
						<h3><span class="time"><?php echo $row['date_msg'].', '. $row['temps_msg']; ?> </span>Vous</h3>
						<span>
							<?php echo $row['msg']; ?>
								<a href="sup-msg.php?id=<?php echo $row['id']; ?>&cin=<?php echo $cin; ?> ">
									<i class="fa fa-trash"></i>
								   </a>
							</span>
					</div>
	
					</div>
				</div><br><br><br><!-- fin sender -->

			<?php } } ?>		

	</div>
	
			      <!-- input box -->
			  <form method="POST" action="insertMsg.php" id="myForm"> 
			      <div class="input-box">
			      		<img src="<?php echo $info['img']; ?>">
			      		<input type="text" placeholder="Entrer Un Message..." id="msg" name="msg">
			      		<input type="hidden" value="<?php echo $cin ; ?>" id="cin" name="cin">
			      		<input type="hidden" value="<?php echo $inp ; ?>" id="inp" name="inp">
			      		<button class="fa fa-paper-plane send" id="submit" type="submit" name="submit"></button>
			      </div>
			    </form>

			      
	</div>		

			      <!-- contact box -->
			      	<!-- </div>	 -->

			      		
			      	</div>

		</div>
		
	</div>

</body>

	<script type="text/javascript">
// 		$(document).ready(function(){ 

// 		$("#submit").on('click', function(){
    
//     const msg=$('#msg').val();
//     const inp=$('#inp').val();
//     const cin=$('#cin').val();
// 				$.ajax({
// 					url: "insertMsg.php",
// 					method:'POST',
// 					data:{
// 						cin:cin,
// 						inp:inp,
// 						msg:msg
// 					},
// 					cache:false,      
// 					success:function(data)
// 					{
// 						$("#msg").val("");
// 						}
						
// 				});

// 			});

// });

	</script>
	<script type="text/javascript">
		const box = document.getElementById('box');
		box.scrollTop = box.scrollHeight;
	</script>

</html>


<!-- <div class="loader-wrapper">
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
 -->