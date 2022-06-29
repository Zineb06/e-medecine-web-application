<?php  
include "../connexion.php";
session_start();
$inp=$_SESSION['inp'];
$nom=$_SESSION['nom_complet'];
if(!isset($inp)){
    header('location:../Login_form.html');
}

$sql="select * from medecin where inp='$inp' ";
$rs=mysqli_query($conx,$sql);
$info=mysqli_fetch_array($rs);


$etat="en demande";
$req="select r.*, p.*  from rdv r, patient p  where r.cin=p.cin and inp='$inp' and etat='$etat' order by id desc ";
$res=mysqli_query($conx,$req);
// $row=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Gestion Des Rendez-Vous</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
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
                    <li class="nav-item"><a class="nav-link " href="index.php"><i
                                class="fas fa-clinic-medical"></i><span>Accueil</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profil.php"><i
                                class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="patient.php"><i
                                class="far fa-user"></i><span>Patients</span></a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="login/login.html"><i
                                class="far fa-user-circle"></i><span>Login</span></a></li> -->

                    <li class="nav-item"><a class="nav-link" href="messagerie.php"><i
                                class="fas fa-envelope"></i><span>Messagerie</span></a></li>
                                <li class="nav-item"><a class="nav-link active" href="appointment.php"><i
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
                                            class="d-none d-lg-inline me-2 text-gray-600 small">Dr. <?php echo $nom; ?></span>   <img class="border rounded-circle img-profile"  src="<?php echo $info['img']; ?>"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a
                                            class="dropdown-item" href="profil.php"><i
                                                class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="../patient/logout.php"><i
                                                class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Rendez-Vous</h3>
                    <div class="card shadow px-0">
                        <div class="card-header py-3 mb-2">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="btn btn-success" href="list-rdv.php" role="button">Liste Des Rendez-Vous</a>
                            </div>
                            <p class="text-success m-0 fw-bold">Gestion Des Rendez_Vous</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                       
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label
                                            class="form-label"><input type="search" class="form-control form-control-sm"
                                                aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>

                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                             <th scope="col">Profil</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Prenom</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Horaire</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php while($row=mysqli_fetch_array($res)){ ?>
                                        <tr>
                                             <td><img src="<?php echo $row['tof']; ?>" height="50px" width="50px" style="border-radius:50%;"></td>
                                            <td scope="row"><?php echo $row['nom']; ?></td>
                                            <td><?php echo $row['prenom']; ?></td>
                                            <td><?php echo $row['date_rdv']; ?></td>
                                            <td><?php echo $row['temps']; ?></td>
                                            <td>
                                                <a href="confirmer-rdv.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-success">Accepter</button></a>
                                                <a href="supp-rdv.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger">refuser</button></a>
                                            </td>
                                        </tr>
                                 <?php }  ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <!-- <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 27</p>
                                </div>
                                <div class="col-md-6">
                                    <nav
                                        class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" aria-label="Previous"
                                                    href="#"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span
                                                        aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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