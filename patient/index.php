<?php 
include "../connexion.php";
session_start();
$pat_id=$_SESSION['pat_id'];

if(!isset($pat_id)){
    header('location:../Login_form.html');
} 

$requete = "select * from patient where cin='$pat_id' ";
$res = mysqli_query($conx,$requete);
$row= mysqli_fetch_array($res);

if(mysqli_num_rows($res)>0){
?> 
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <link rel="stylesheet" href="../medecin/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../medecin/assets/fonts/fontawesome-all.min.css">
    <style type="text/css">
    	
		.cont{ display: flex; justify-content: center; position: absolute;  top:10%; left:20%; }
		
		.h2{
			position: absolute;
			 font-family: 'Poppins', sans-serif;
			top: 30%;
			left: 60%;
			color: black;
			text-align: center;
		    padding-bottom: 2rem;
		    /*text-shadow: var(--text-shadow);*/
		    font-size: 3rem;
		    letter-spacing: .4rem;
		}
		.h2 i{ color: #19a085; }
		
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-success p-0">
            <div class="container-fluid d-flex flex-column p-0"><a
                    class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon n-15"><i class="fa fa-heartbeat" aria-hidden="true"></i></div>
                    <div class="sidebar-brand-text mx-3" class="fa-regular"><span>MaSanté</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                	<li class="nav-item"><a class="nav-link active" href="index.php"><i
                                class="fas fa-home"></i><span>Acceil</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="profil-form.php"><i
                                class="fas fa-user"></i><span>Mon Profil</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="list-rdv.php"><i
                                class="fas fa-calendar"></i><span>Mes Rendez-Vous</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="list-medecins.php"><i
                                class="fa fa-notes-medical"></i><span>Liste Des Médecins</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="messagerie.php"><i
                                class="fas fa-envelope"></i><span>Messagerie</span></a></li>
                    
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                        id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>


        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3"
                            id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                    aria-expanded="false" data-bs-toggle="dropdown" href="#"><i
                                        class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    
                                </div>
                            </li>
                          


                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                            class="d-none d-lg-inline me-2 text-gray-600 small"> <?php echo $row['nom'].' '.$row['prenom']; ?></span>
                                            <img class="border rounded-circle img-profile" src="<?php echo $row['tof'];?>"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a
                                            class="dropdown-item" href="profil-form.php"><i
                                                class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i
                                                class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
    

    </div></div>
</div>

<div class="cont">
<img src="../image/img-3.png" width="550vh" height="550vh">
</div>
<h2 class="h2"><i>Bienvenue </i> Dans votre Espace Patient ! </h2>

<!-- <h2 class="h3">Prenez Votre <i>Rendez-Vous</i> Tout De Suite !</h2> -->


</body>
 <script src="../medecin/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../medecin/assets/js/bs-init.js"></script>
    <script src="../medecin/assets/js/theme.js"></script>

    <div class="loader-wrapper">
    <img src="../gif/2.gif">
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
</html>
<?php 

  } 
    
?>