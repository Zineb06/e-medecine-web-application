<?php  
include "../connexion.php";
session_start();
$inp=$_SESSION['inp'];
$nom=$_SESSION['nom_complet'];
if(!isset($inp)){
    header('location:../Login_form.html');
}
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
</head>

<!-- nav bar -->

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
                    <li class="nav-item"><a class="nav-link " href="index.php"><i
                                class="fas fa-clinic-medical"></i><span>Accueil</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="profil.php"><i
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

<!-- main -->

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3"
                            id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
               
                 <!-- search form -->

                        

                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                    aria-expanded="false" data-bs-toggle="dropdown" href="#"><i
                                        class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                   
                                </div>
                            </li>
                            <!-- <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                            class="badge bg-danger badge-counter">1+</span><i
                                            class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">Notifications</h6><a
                                            class="dropdown-item d-flex align-items-center" href="#">

                                       
                                            <div class="me-3">
                                                <div class="bg-success icon-circle"><i
                                                        class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">12/06/2022</span>
                                                <p> Vérifier vos rendez-vous!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                        
                                   
                                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Toutes les notifications</a>
                                    </div>
                                </div>
                            </li>
 -->
                <?php 
                     $requete = "select * from medecin where inp='$inp' ";
                     $res = mysqli_query($conx,$requete);
                     $row= mysqli_fetch_array($res);

                     if(mysqli_num_rows($res)>0){
                ?>
                  <!-- left profil photo -->
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                            class="d-none d-lg-inline me-2 text-gray-600 small">Dr. <?php echo $nom; ?></span>
                                           <img class="border rounded-circle img-profile"  src="<?php echo $row['img']; ?>"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a
                                            class="dropdown-item" href="profil.php"><i
                                                class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Modifier
                                            Profile</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item"
                                            href="../patient/logout.php"><i
                                                class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

        <!-- profil -->


                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3 ">
                            <form action="update-photo.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4"
                                        src="<?php echo $row['img']; ?>" width="160" height="160">
                                    <div class="mb-3">
              <!-- ***here **** --> <input class="form-control" type="file" name="image" ><br>
                                    <button class="btn btn-primary btn-sm" type="submit">Modifier</button>
                                        </div>
                                </div>
                          </form>
                            </div>
                            <!--   -->
                       
                       

                            <div class="card mb-3 ">
                            <form action="add-signature.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body text-center shadow"><img class=" mb-3 mt-4"
                                        src="<?php echo $row['sign']; ?>" width="80" height="70">
                                    <div class="mb-3">
                                        <?php if($row['sign']=="null"){ ?>
              <!-- ***here **** --> <input class="form-control" type="file" name="image" style="                    width:190px; height:30px;">                 <br>
                                    <button class="btn btn-info btn-sm" type="submit">Ajouter Une Signature</button>
                                <?php }if($row['sign']!="null"){?>
                                            <p class="text-success m-0 fw-bold">Signature</p>
                                 <?php } ?>           
                                        </div>
                                </div>
                          </form>
                            </div>
                          </div>   
                     <div class="col-lg-8">
                <!-- inputs -->

                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3 ">
                                        <div class="card-header py-3">
                                            <p class="text-success m-0 fw-bold">Informations Personnelles</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="nom"><strong>
                                                                    Nom et Prenom</strong></label><input class="form-control"
                                                                type="text" id="nom" placeholder="<?php echo $row['nom_complet'] ?>" name="nom" readonly>
                                                        </div>
                                                    </div>


                                                    <!-- <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="prenom"><strong>Prénom</strong></label><input
                                                                class="form-control" type="text" id="prenom"
                                                                placeholder="" name="prenom" readonly></div>
                                                    </div> -->
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="cin"><strong>Specialité</strong></label><input
                                                                class="form-control" type="text" id="cin"
                                                                placeholder="<?php echo $row['specialite'] ?>" name="specialite" readonly></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="nss"><strong>INP</strong></label><input
                                                                class="form-control" type="text" id="nss"
                                                                placeholder="<?php echo $row['inp'] ?>" name="inp" readonly></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="ko"><strong>Genre</strong></label>
                                                            <select class="form-select" name="genre" 
                                                                aria-label="Disabled select example" readonly>
                                                                <option selected><?php echo $row['genre'] ?></option>

                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col">
                                                        <label class="form-label" for="ko"><strong>Date de
                                                                naissance</strong></label>
                                                        <div class="mb-3">
                                                            <div class="input-group date" id="datepicker">
                                                                <input type="text" class="form-control"
                                                                    placeholder=" <?php echo $row['daten'] ?>" name="dateN" readonly>
                                                                <span class="input-group-append">
                                                                    <span class="input-group-text bg-white d-block">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="nom"><strong>
                                                                    Description</strong></label><textarea class="form-control"
                                                               id="nom" placeholder="<?php echo $row['desc'] ?>" name="nom" readonly></textarea>
                                                        </div>
                                                    </div>
                                        </div>

                                       <!--  <div class="mb-3 px-2"><button class="btn btn-success btn-sm"
                                                type="submit">Sauvegarder</button></div> -->
                                        </form>
                                    </div>
                                </div>
                            </div> </div></div></div>
                            <div class="card shadow ms-4" style="margin-bottom: 5%;">
                                <div class="card-header py-3">
                                    <p class="text-success m-0 fw-bold">Informations de contact</p>
                                </div>
                                <div class="card-body">
                                    <form action="update.php" method="POST">
                                        <div class="mb-3"><label class="form-label"
                                                for="address"><strong>Addresse</strong></label><input
                                                class="form-control" type="text" id="address" value="<?php echo $row['adresse'] ?>"
                                                name="adresse"></div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for=""><strong>Numéro de
                                                            téléphone</strong></label><input class="form-control"
                                                        type="text" id="tele" value="<?php echo $row['tel'] ?>" name="tel">
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3"><label class="form-label"
                                                            for="email"><strong>Email</strong></label><input
                                                            class="form-control" type="text" id="email"
                                                            value="<?php echo $row['email'] ?>" name="email"></div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- <div class="mb-3"><button class="btn btn-success btn-sm"
                                                type="submit">Sauvegarder</button></div> -->
 
                                 </div>
                    
                             </div>
            </div>
            <div class="card shadow ms-4">
                <div class="card-header py-3 ">
                    <p class="text-success m-0 fw-bold">Informations de compte</p>
                </div>
                <div class="card-body py-3">
                    <div class="row">
                        <div class="col-md-6">
                      
                                <div class="col">
                                    <div class="mb-3"><label class="form-label"
                                            for="username"><strong>Username</strong></label><input class="form-control"
                                            type="text" id="username" value="<?php echo $row['username'] ?>" name="username"></div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for=""><strong>Mot de
                                                    passe</strong></label><input class="form-control" type="text"
                                                id="password" value="<?php echo $row['pwd'] ?>" name="pwd" readonly>
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-3"><button class="btn btn-success btn-sm"
                                        type="submit">Sauvegarder</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } //fin de if 
?>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
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