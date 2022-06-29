<?php  
include "../connexion.php";
session_start();
$inp=$_SESSION['inp'];
$nom=$_SESSION['nom_complet'];
if(!isset($inp)){
    header('location:../Login_form.html');
}

$req="select * from medecin where inp='$inp' ";
$res=mysqli_query($conx,$req);
$row=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html> 

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>espace médecin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <style type="text/css">

       #caption h5{
        background: rgba(0, 0, 0, 0.5);
            position: absolute;
             font-family: 'Poppins', sans-serif;
            bottom:16%;
            left: -5%;
            color: white;
            text-align: center;
            padding-bottom: 2rem;
            /*text-shadow: var(--text-shadow);*/
            font-size: 2rem;
            letter-spacing: .4rem;
        }
       #caption h5 i{ color: lightgreen; }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a
                    class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon n-15"><i class="fa fa-heartbeat" aria-hidden="true"></i></div>
                    <div class="sidebar-brand-text mx-3" class="fa-regular"><span>MaSanté</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="index.php"><i
                                class="fas fa-clinic-medical"></i><span>Accueil</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profil.php"><i
                                class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="patient.php"><i
                                class="far fa-user"></i><span>Patients</span></a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="login/login.html"><i
                                class="far fa-user-circle"></i><span>Login</span></a></li> -->

                    <li class="nav-item"><a class="nav-link" href="messagerie.php"><i
                                class="fas fa-envelope"></i><span>Messagerie</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="appointment.php"><i
                                    class="fa fa-calendar" aria-hidden="true"></i><span>Rendez-Vous</span></a></li>
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
                                            class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $nom; ?></span>
                                            <img class="border rounded-circle img-profile"  src="<?php echo $row['img']; ?>">
                                        </a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" href="profil.php"><i
                                                class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Modifier
                                            Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="../index.php"><i
                                                class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Home
                                            page</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="../patient/logout.php"><i
                                                class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="assets/img/avatars/desk.svg" class="d-block w-100" alt="..." width="640"
                                height="500">
                            <div class="carousel-caption d-none d-md-block" id="caption">
                                <h5><b>Bienvenue dans votre <i>Espace médecin</i></b></h5>

                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="assets/img/avatars/hepatitis.svg" class="d-block w-100" alt="..." width="640"
                                height="500">
                            <div class="carousel-caption d-none d-md-block" id="caption">
                                <h5><b>Bienvenue dans votre<i> Espace médecin</i></b>
                                </h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/avatars/cell.svg" class="d-block w-100" alt="..." width="680"
                                height="500">
                            <div class="carousel-caption d-none d-md-block" id="caption">
                                <h5><b><b>Bienvenue dans votre <i>Espace médecin</i></b></b>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>-->
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>

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