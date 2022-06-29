<?php
include 'connexion.php';
if(isset($_POST['submit'])){
$nom_complet=$_POST["nom_complet"];
$dateN=$_POST["dateN"];
$genre=$_POST["genre"];
$inp=$_POST["inp"];
$specialite=$_POST["specialite"];
$email=$_POST["email"];
$adresse=$_POST["adresse"];
$tel=$_POST["tel"];
$username=$_POST["username"];
$pwd=$_POST["pwd"];
$img="../image/user.png";
$desc=$_POST["desc"];
 

$sql="INSERT INTO `medecin`(`inp`, `nom_complet`, `daten`, `genre`, `specialite`, `email`, `tel`, `adresse`, `username`, `pwd`, `img`, `status`, `desc`, `sign`) 
VALUES ('$inp','$nom_complet','$dateN','$genre','$specialite','$email','$tel','$adresse','$username','$pwd','$img','null','$desc','null') ";


$result=mysqli_query($conx,$sql);
if($result){
    //echo "data inserted succesfully";
    header('location:med.php');
}else{
    die(mysqli_error($conx));
}
}

?>


<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* ===== Google Font Import - Poppins ===== */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #16a085;
            ;
        }

        .container {
            position: relative;
            max-width: 900px;
            width: 100%;
            border-radius: 6px;
            padding: 30px;
            margin: 0 15px;
            background-color: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .container header {
            position: relative;
            font-size: 20px;
            font-weight: 600;
            color: #333;
        }

        .container header::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: -2px;
            height: 3px;
            width: 27px;
            border-radius: 8px;
            background-color: #16a085;
            ;
        }

        .container form {
            position: relative;
            margin-top: 16px;
            min-height: 490px;
            background-color: #fff;
            overflow: hidden;
        }

        .container form .form {
            position: absolute;
            background-color: #fff;
            transition: 0.3s ease;
        }

        .container form .form.second {
            opacity: 0;
            pointer-events: none;
            transform: translateX(100%);
        }

        form.secActive .form.second {
            opacity: 1;
            pointer-events: auto;
            transform: translateX(0);
        }

        form.secActive .form.first {
            opacity: 0;
            pointer-events: none;
            transform: translateX(-100%);
        }

        .container form .title {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            font-weight: 500;
            margin: 6px 0;
            color: #333;
        }

        .container form .fields {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        form .fields .input-field {
            display: flex;
            width: calc(100% / 3 - 15px);
            flex-direction: column;
            margin: 2px 0;
        }

        .input-field label {
            font-size: 12px;
            font-weight: 500;
            color: #2e2e2e;
        }

        .input-field input,
        select {
            outline: none;
            font-size: 14px;
            font-weight: 400;
            color: #333;
            border-radius: 5px;
            border: 1px solid #aaa;
            padding: 0 15px;
            height: 42px;
            margin: 8px 0;
        }

        .input-field input :focus,
        .input-field select:focus {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
        }

        .input-field select,
        .input-field input[type="date"] {
            color: #707070;
        }

        .input-field input[type="date"]:valid {
            color: #333;
        }

        .container form button,
        .backBtn {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 30px;
            max-width: 200px;
            width: 100%;
            border: none;
            outline: none;
            color: #fff;
            border-radius: 5px;
            margin: 10px 0;
            background-color: darkgreen;
            transition: all 0.3s linear;
            cursor: pointer;
        }

        .backBtn {
            position: absolute;
            top: 5%;
            right: 0;
            margin-right: 20%;
            z-index: 1;
        }

        .container form .btnText {
            font-size: 14px;
            font-weight: 400;
        }

        form button:hover {
            background-color: springgreen;
        }

        .backBtn:hover {
            background-color: springgreen;
        }

        form button i,
        form .backBtn i {
            margin: 0 6px;
        }

        form .backBtn i {
            transform: rotate(180deg);
        }

        form .buttons {
            display: flex;
            align-items: center;
        }

        form .buttons button,
        .backBtn {
            margin-right: 14px;
        }

        @media (max-width: 750px) {
            .container form {
                overflow-y: scroll;
            }

            .container form::-webkit-scrollbar {
                display: none;
            }

            form .fields .input-field {
                width: calc(100% / 2 - 15px);
            }
        }

        @media (max-width: 550px) {
            form .fields .input-field {
                width: 100%;
            }
        }
    </style>

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

   
</head>

<body>
    <div class="container">
    
        <header>Inscription Du Médecin</header>
        <form action="" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">
                        <h5>Informations Personnelles</h5>
                    </span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Nom_complet</label>
                            <input type="text" name="nom_complet" placeholder="Votre Nom.." required>
                        </div>

                        <div class="input-field">
                            <label>Date De Naissance</label>
                            <input type="date" name="dateN" placeholder="Votre Date De Naissance" required>
                        </div>

                        <div class="input-field">
                            <label>Specialité</label>
                            <input type="text" name="specialite" placeholder="Votre Specialité..." required>
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
                            <label>INP</label>
                            <input type="number" name="inp" placeholder="Votre INP.." required>
                        </div>

                        <div class="input-field">
                            <label>Description</label>
                            <textarea  name="desc" placeholder="Description.." required></textarea>
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
                            <input type="text" name="tel" placeholder="Votre Numéro télé.." required>
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
                                <input type="password" placeholder="Votre Mot De Passe..." name="pwd" required>
                            </div>

                        </div>
                    </div>

                    <div class="buttons">
                        <button class="sumbit" name="submit">
                            <span class="btnText">Ajouter</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>

            </div>
    </div>

    </form>
    </div>

</body>

</html>