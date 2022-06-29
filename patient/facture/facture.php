<?php
include "../../connexion.php";
session_start();
$pat_id=$_SESSION['pat_id'];
$id=$_GET['id'];
$req=" select p.*, m.*, r.* from patient p, rdv r, medecin m where p.cin=r.cin and r.inp=m.inp and r.id='$id'  ";
$res=mysqli_query($conx,$req);
$row=mysqli_fetch_assoc($res);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="style.css">

    <title>Facture..</title>
     <style>
        *{  text-transform: capitalize;}
        @media print{
            #btntxt{ visibility: hidden; }
        }
        #btntxt{ position: absolute; top:10%; left:5%; }
    </style>
</head>

<body>
    <div class="my-5 page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <img src="logo.png" alt="" class="img-fluid">
                </div>
                <div class="top-left">
                    <div class="graphic-path">
                        <p>Facture</p>
                    </div>
                    <div class="position-relative">
                        <p>Facture No. <span><?php echo $row['id']; ?></span></p>
                    </div>
                </div>
            </section>



            <section class="product-area mt-4">
                <p class="m-0 font-weight-bold text-danger"><i><u>Informations sur la téléconsultation: </u></i></p><br>
                <table class="table table-hover table-success ">
                    <thead>
                        <tr>
                            <td>Nom</td>
                            <td>Prénom</td>
                            <td>NSS</td>
                            <td>Nom du médecin</td>
                            <td>Date de téléconsultation</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row['nom']; ?></td>
                            <td><?php echo $row['prenom']; ?></td>
                            <td><?php echo $row['nss']; ?></td>
                            <td><?php echo $row['nom_complet']; ?></td>
                            <td><?php echo $row['date_rdv']; ?></td>
                        </tr>

                    </tbody>
                </table>
            </section>

            <section class="balance-info">
                <div class="row">
                    <div class="col-8">
                        <p class="m-0 font-weight-bold text-danger"><i><u>CONDITIONS ET MODALITES DE PAIEMENT: </u></i></p>
                        <p>Paiement  effectué par couverture médicale du patient.</p>
                        <p><b><em>Toute demande de rembourssement doit être réclamé dans les limites de 30jrs à partir de la date de la consultation.</em></b></p>
                    </div>
                    <div class="col-4">
                        <h3 class="m-0 px-5 font-weight-bold text-danger"><span
                                class="badge badge-pill badge-danger">Prix : 150 DH</span></h3><br>

                        <!-- Signature -->
                        <div class="col-12 m-2 px-5">
                            <img src="signature.png" class="img-fluid" alt="">
                            <p class="text-center m-2">Signature&nbspDu&nbspDirecteur </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Cart BG -->
            <img src="cart.png" class="img-fluid cart-bg" alt="">

            <footer>
                <hr>
                <p class="m-1 text-center">
                    Merci pour votre confiance! <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </p>
                <div class="social pt-3">
                    <span class="pr-2">
                        <i class="fas fa-mobile-alt"></i>
                        <span>0560702978</span>
                    </span>
                    <span class="pr-2">
                        <i class="fas fa-envelope"></i>
                        <span>masanté@gmail.com</span>
                    </span>
                    <span class="pr-2">
                        <i class="fab fa-facebook-f"></i>
                        <span>/masanté_officiel</span>
                    </span>

                    <span class="pr-2">
                        <i class="fa fa-location-arrow" aria-hidden="true"></i>
                        <span>/ Beni Mellal, Maroc - 23300</span>
                    </span>
                </div>
            </footer>
        </div>
    </div>
        <button onclick="printFunction()" class="btn" style="background:lightgreen;" id="btntxt"> Télécharger </button>

 <script>
      function printFunction() { 
        window.print(); 
      }
    </script>
</body>

</html>