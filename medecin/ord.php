<?php  
include "../connexion.php";
session_start();
$inp=$_SESSION['inp'];
$nom=$_SESSION['nom_complet'];
$id=$_GET['id'];
if(!isset($inp)){
    header('location:../Login_form.html');
}

$sql="select * from medecin where inp='$inp' ";
$rs=mysqli_query($conx,$sql);
$info=mysqli_fetch_array($rs);


$req="select r.*,  p.*  from rdv r, patient p  where r.cin=p.cin  and r.id='$id' ";
$res=mysqli_query($conx,$req);
$row=mysqli_fetch_array($res);

$req2="select * from ord where  id='$id' ";
$res2=mysqli_query($conx,$req2);
// $row2=mysqli_fetch_array($res2);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Ajouter une ordonnance</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <style>
        #alert{
            position:relative; right:30%; margin-top:6%; width:50vh; height:10vh; font-size: 14px;
        }
        #fa{ text-decoration: none; color: #fff}
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
                    <li class="nav-item"><a class="nav-link " href="index.php"><i
                                class="fas fa-clinic-medical"></i><span>Accueil</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="profil.php"><i
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
                    <h3 class="text-dark mb-4">Ordonnance Médicale</h3>
                    <div class="card shadow px-0">
                        <div class="card-header py-3 mb-2">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="btn btn-info" href="list-rdv.php" role="button">Liste Des Rendez-Vous</a>
                            </div>
                            <p class="text-success m-0 fw-bold">Ajouter Une Ordonnance</p> 
                        </div>
                        <div class="card-body">
                            
                            <div class="row"
                                aria-describedby="dataTable_info">
                                <form>
                                      <div class="row">
                                        <div class="col">
                                            <label for="exampleInputPassword1">Nom et Prenom </label>
                                          <input type="text" class="form-control" value="<?php echo $row['nom'].' '.$row['prenom']; ?>" readonly>
                                        </div>
                                        <div class="col">
                                            <label for="exampleInputPassword1">Genre</label>
                                          <input type="text" class="form-control" value="<?php echo $row['genre'];?>" readonly>
                                        </div>
                                        <div class="col">
                                            <label for="exampleInputPassword1">Date De Naissance</label>
                                          <input type="text" class="form-control" value="<?php echo $row['daten'];?>" readonly>
                                        </div>
                                        <input type="hidden" class="form-control" value="<?php echo $row2['cin'];?>" name="cin">
                                      </div>
                                      <br>
                                      
                                      <!-- prescrition -->
                                
                                 </form> <b> <label for="exampleInputPassword1">Liste Des Prescriptions</b></label>
                        <?php while($row2=mysqli_fetch_array($res2)){ ?>
                         <form  method="POST" action="update-ord.php">
                                      <div class="row">
                                       
                                        <div class="col">
                                          <input type="text" class="form-control" value="<?php echo $row2['presc'];?>" name="presc">
                                        </div><br>
                                        <div class="col">
                                          <input type="text" class="form-control"  value="<?php echo $row2['dose'];?>" name="dose">
                                        </div><br>
                                        <div class="col">
                                          <input type="text" class="form-control" value="<?php echo $row2['frequence'];?>" name="freq">
                                        </div><br><br>
                                        <div class="col">
                                          <input type="text" class="form-control" value="<?php echo $row2['duree'];?>" name="duree">
                                        </div><br>

                                        <input type="hidden" class="form-control" value="<?php echo $row2['id'];?>" name="id">
                                        <input type="hidden" class="form-control" value="<?php echo $row2['ido'];?>" name="ido">

                                        <div class="col">
                                         
                                         <a href="supp-ord.php?ido=<?php echo $row2['ido']; ?>&id=<?php echo $row2['id']; ?>" class="btn btn-danger" style="color:white"><i class="fa fa-trash"></i></a>
                                         &nbsp&nbsp
                                         
                                         <button class="btn btn-warning" style="color:white" type="submit"><i class="fa fa-pen"></i></button>

                                        </div>
                                    </div>
                                    
                                  </form>
                            <?php } ?>
                            
                             <hr> <br>

                                <form  method="POST" action="add-ord.php">
                                      <div class="row">
                                        <div class="col">
                                        <label for="exampleInputPassword1">Prescription</label>
                                          <input type="text" class="form-control"  placeholder="Prescription..." name="presc" >
                                        </div>
                                        <div class="col">
                                        <label for="exampleInputPassword1">Dose</label>
                                          <input type="text" class="form-control"  placeholder="Dose..." name="dose" >
                                        </div>
                                        <div class="col">
                                        <label for="exampleInputPassword1">Fréquence</label>
                                          <input type="text" class="form-control"  placeholder="Fréquence..." name="freq" >
                                        </div>
                                        <div class="col">
                                        <label for="exampleInputPassword1">Durée</label>
                                          <input type="text" class="form-control"  placeholder="Durée..." name="duree" >
                                           <input type="hidden" class="form-control"   name="id" value="<?php echo $id; ?>"  >
                                           <input type="hidden" class="form-control"   name="cin" value="<?php echo $row['cin'];?>"  >
                                        </div>
                                    </div>
                                      <br>
                                     
                                    <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                                </form>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
</div>
</body>
 <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
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
</script> -->