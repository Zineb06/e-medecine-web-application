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
    <title>Profile</title>
    <link rel="stylesheet" href="../medecin/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../medecin/assets/fonts/fontawesome-all.min.css">
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
                    <li class="nav-item"><a class="nav-link" href="index.php"><i
                                class="fas fa-home"></i><span>Accueil</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="profil-form.php"><i
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
                                            class="d-none d-lg-inline me-2 text-gray-600 small"> <?php echo $row['nom'].' '.$row['prenom']; ?></span>  <img class="border rounded-circle img-profile" src="<?php echo $row['tof'];?>"></a>
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
    


    <div class="container-fluid">
                    <h3 class="text-dark mb-4">Mon Profile</h3>
                    <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-lg-4">
                           <div class="card mb-3 ">
                            <form action="update-photo.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4"
                                        src="<?php echo $row['tof']; ?>" width="160" height="160">
                                    <div class="mb-3">
              <!-- ***here **** --> <input class="form-control" type="file" name="image" ><br>
                                    <button class="btn btn-primary btn-sm" type="submit">Modifier</button>
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
                                            <form action="update_profil.php" method="POST">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="nom"><strong>
                                                                    Nom</strong></label><input class="form-control"
                                                                type="text" id="nom" value="<?php echo $row['nom'] ?>" name="nom" required>
                                                        </div>
                                                    </div>


                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="prenom"><strong>Prénom</strong></label><input
                                                                class="form-control" type="text" id="prenom"
                                                                value="<?php echo $row['prenom'] ?>" name="prenom" required></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="cin"><strong>CIN</strong></label><input
                                                                class="form-control" type="text" id="cin"
                                                                value="<?php echo $row['cin'] ?>" name="cin" required></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="nss"><strong>NSS</strong></label><input
                                                                class="form-control" type="text" id="nss"
                                                                value="<?php echo $row['nss'] ?>" name="nss" required></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label"
                                                                for="ko"><strong>Genre</strong></label>
                                                            <select class="form-select" name="genre" 
                                                                aria-label="Disabled select example" required>
                                                                <option selected><?php echo $row['genre'] ?></option>
                                                                <option>femme</option>
                                                                <option>homme</option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col">
                                                        <label class="form-label" for="ko"><strong>Date de
                                                                naissance</strong></label>
                                                        <div class="mb-3">
                                                            <div class="input-group date" id="datepicker">
                                                                <input type="text" class="form-control"
                                                                    value ="<?php echo $row['daten'] ?>" name="dateN" required>
                                                                <span class="input-group-append">
                                                                    <span class="input-group-text bg-white d-block">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                        </div>

                                       <!--  <div class="mb-3 px-2"><button class="btn btn-success btn-sm"
                                                type="submit">Sauvegarder</button></div> -->
                                       
                                    </div>
                                </div>
                            </div> </div></div></div>
                            <div class="card shadow ms-4" style="margin-bottom: 5%;">
                                <div class="card-header py-3">
                                    <p class="text-success m-0 fw-bold">Informations de contact</p>
                                </div>
                                <div class="card-body">
                                    
                                        <div class="mb-3"><label class="form-label"
                                                for="address"><strong>Addresse</strong></label><input
                                                class="form-control" type="text" id="address" value="<?php echo $row['adresse'] ?>"
                                                name="adresse" required></div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for=""><strong>Numéro de
                                                            téléphone</strong></label><input class="form-control"
                                                        type="text" id="tele" value="<?php echo $row['tel'] ?>" name="tel" required>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3"><label class="form-label"
                                                            for="email"><strong>Email</strong></label><input
                                                            class="form-control" type="text" id="email"
                                                            value="<?php echo $row['email'] ?>" name="email" required></div>
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
                                            type="text" id="username" value="<?php echo $row['username'] ?>" name="username" required></div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for=""><strong>Nouveau Mot de
                                                    passe</strong></label><input class="form-control" type="text"
                                                id="password" value="<?php echo $row['pwd'] ?>" name="pwd" required>
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
    </div></div>
</div>
</body>
 <script src="../medecin/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../medecin/assets/js/bs-init.js"></script>
    <script src="../medecin/assets/js/theme.js"></script>


    <div class="loader-wrapper">
    <img src="../gif/1.gif">
</div>
<style> 
  .loader-wrapper{
width: 100%;
height: 100%;
position: absolute;
top:-20%;
left: 0;
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