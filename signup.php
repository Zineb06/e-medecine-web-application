<?php

include "connexion.php";
if(isset($_POST['submit'])){

$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$dateN=$_POST["dateN"];
$genre=$_POST["genre"];
$cin=$_POST["cin"];
$nss=$_POST["nss"];
$email=$_POST["email"];
$adresse=$_POST["adresse"];
$tel=$_POST["tel"];
$username=$_POST["username"];
$pwd=$_POST["pwd"];
$tof="../image/user.png";

$stmt = $conx->prepare("insert into patient(cin,nom,prenom,daten,genre,nss,email,tel,adresse,username,pwd,tof) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssssssss",$cin,$nom, $prenom, $dateN, $genre, $nss, $email, $tel, $adresse, $username, $pwd, $tof);
if($stmt->execute()==true){
    $stmt->close();
    $conx->close();
?>
<div class="alert alert-success" role="alert" id="alert"><center><b style="font-size:20px;">Inscription réussite!</b></center>
            </div>     
<?php
}
else{ ?>
<div class="alert alert-danger" role="alert" id="alert"><center><b style="font-size:20px;">Erreur d'inscription! Veuillez réssayer..</b></center>
            </div>     
<?php 
}}
?>

<!DOCTYPE html> 
<!--===  === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Inscription Du Patient</title> 
</head>
<body style="background:#fff;">


	<a href="Login_form.html" class="btn btn-success" style="position:absolute; top: 10px; left:0" >Se Connecter</a>

    <div class="container" >
        <form action="" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title"><h5>Informations Personnelles</h5></span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Nom</label>
                            <input type="text" name="nom" placeholder="Votre Nom.." required>
                        </div>

                        <div class="input-field">
                            <label>Prenom</label>
                            <input type="text" name="prenom" placeholder="Votre Prenom.." required>
                        </div>

                        <div class="input-field">
                            <label>Date De Naissance</label>
                            <input type="date" name="dateN" placeholder="Votre Date De Naissance" required>
                        </div>

                        <div class="input-field">
                            <label>CIN</label>
                            <input type="text" name="cin" placeholder="Votre CIN" required>
                        </div>

                        <div class="input-field">
                            <label>Genre</label>
                            <select name="genre" required>
                                <option disabled selected>Selectinner votre genre</option>
                                <option>Femme</option>
                                <option>Homme</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>NSS</label>
                            <input type="number" name="nss" placeholder="NSS.." required>
                        </div>       

                    </div>
                </div>

              <div class="details ID">
                    <span class="title">Informations De Contact</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Votre Email.." required>
                        </div>

                        <div class="input-field">
                            <label>Numéro De Téléphone</label>
                            <input type="number" name="tel" placeholder="Votre Numéro télé.." required>
                        </div>

                         <div class="input-field">
                            <label>Adresse</label>
                            <textarea placeholder="Votre Adresse..." name="adresse" required></textarea> 
                        </div>

                    </div>

                     <div class="details address">
                    <span class="title">Informations Du Compte</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>User Name</label>
                            <input type="text" placeholder="Votre Nom D'Utilisateur.." name="username" required>
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input type="text" placeholder="Votre Mot De Passe..." name="pwd" required>
                        </div>

                    </div>
                </div>

	                <div class="buttons">
	                    <input type="submit" name="submit" value="Envoyer" class="btnbtn">
                    </div>
            </div>
                  
          </div> 
       </div>

   </form>
 </div>

</body>
 
    <div class="loader-wrapper">
    <img src="gif/1.gif">
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
<script>
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow");
    });
</script>

<script src="js/script.js"></script>
</html>
