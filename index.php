<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaSanté </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        .doctors .box-container .box .img{
    padding: 3.5rem;
}

    </style>

</head>
<body>
    
    <div class="loader-wrapper">
    <img src="gif/2.gif">
</div>
<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo"> <i class="fas fa-heartbeat"></i> MaSanté </a>

    <nav class="navbar">
        <a href="#home">Accueil</a>
        <a href="#services">services</a>
        <a href="#about">A propos</a>
        <a href="#specialites">Specialités</a>
        <a href="#doctors">Médecins</a>
        <a href="#temoignage">Témoignage</a>
        <a href="#contact">Contact</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="image">
        <img src="image/home-img.svg" alt="">
    </div>

    <div class="content">
        <h3>Votre santé, notre priorité</h3>
        <p>Bénéficiez de nos services en vous inscrivons avec nous et contacter plusieurs médecins experts.</p>
        <a href="Login_form.html"><input type="button" value="Login" class="btn"></a>
        <a href="signup.html"><input type="button" value="Sign Up" class="btn"></a>
    </div>

</section>

<!-- home section ends -->

<!-- icons section starts  -->

<section class="icons-container">

 
</section>

<section class="services" id="services">

    <h1 class="heading"> Nos <span>services</span> </h1>

    <div class="box-container">

        <div class="box">
            <i class="fas fa-notes-medical"></i>
            <h3>Rendez-vous en ligne</h3>
           </div>

        <div class="box">
            <i class="fas fa-user-md"></i>
            <h3>Médecins experts</h3>
        </div>

        <div class="box">
            <i class="fas fa-heartbeat"></i>
            <h3>Téléconsultation à prix fixe de <b style="color:#16a085">150dh</b></h3>
      </div>

    </div>

</section>

<!-- services section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span>A propos</span> De nous </h1>

    <div class="row">

        <div class="image">
            <img src="image/about-img.svg" alt="">
        </div>

        <div class="content">
            <h3>Nous prenons soin de votre santé</h3>
            <p>MaSanté est un site web  qui fournit des services de santé, de conseil et de processus de médecine. Nos employés dévoués offrent des connaissances stratégiques, une expertise médicale , et une expérience professionelle dans le domaine. </p>
            <p>Nous nous concentrons sur les outils qui promettent de réduire les coûts et le temps, de rationaliser les processus, et optimiser la communication entre le patient et le médecin, soutenus par nos processus de qualité solides, et notre riche expérience dans le domaine médical.</p>
        </div>

    </div>

</section>

<!-- about section ends -->
<!-- specialités section  -->

<section class="doctors" id="specialites">

    <h1 class="heading"> Nos <span>spécialités</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="icons/cardio.png" class="img">
            <h3> Cardiologie</h3>
        </div>      

        <div class="box">
            <img src="icons/doc.png" class="img">
            <h3>Médecine générale</h3>
        </div>

        <div class="box">
            <img src="icons/gyn.png" class="img">
            <h3> Gynécologie</h3>
        </div>

        <div class="box">
           <img src="icons/kids.png" class="img">
            <h3>Pédiatrie</h3>
        </div>

       <!--  <div class="box">
             <img src="icons/urgence.png" class="img">
            <h3>Urgences</h3>
        </div> -->

        <div class="box">
           <img src="icons/nerve.png" class="img">
            <h3>Pneumologie</h3>
        </div>
    </div>
</section>

<!-- spécialités section ends -->
<!-- doctors section starts  -->

<section class="doctors" id="doctors">
    <div class="search">
        <h1 class="chercher">Trouver<span>Un Médecin</span></h1>
        <form  action="patient/search_med_index.php" method="POST" class="search-form">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    <h1 class="heading"> Nos <span>Médecins</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="image/doc-1.jpg" alt="">
            <h3>Mohamed Karim</h3>
            <span>Généraliste</span>
            
        </div>

        <div class="box">
            <img src="image/doc-2.jpg" alt="">
            <h3>Taha Karim</h3>
            <span>Généraliste</span>
            
        </div>

        <div class="box">
            <img src="image/doc-3.jpg" alt="">
            <h3>Amine Karim</h3>
            <span>Cardiologue</span>
            
        </div>

        <div class="box">
            <img src="image/doc-7.jpg" alt="">
            <h3>Meriem Samlaoui</h3>
            <span>Gynécologue</span>
            
        </div>

        <!-- <div class="box">
            <img src="image/doc-5.jpg" alt="">
            <h3>medecin-x</h3>
            <span>specialité</span>
           
        </div>

        <div class="box">
            <img src="image/doc-6.jpg" alt="">
            <h3>medecin-x</h3>
            <span>specialité</span>
            
        </div> -->
    </div>
     <a href="patient/list-med.php" class="btn">Plus..<span class="fas fa-chevron-right"></span></a>

</section>

<!-- doctors section ends -->

<!-- review section starts  -->

<section class="review" id="temoignage">
    
    <h1 class="heading"> Des <span>témoignages</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="image/pic-1.png" alt="">
            <h3>Karim Nouri</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text">Je suis très satisfait de cette application! Simple mais avec contient des fonctionnalités essentielles pour une bonne livraison.</p>
        </div>

        <div class="box">
            <img src="image/pic-2.png" alt="">
            <h3>Kawtar baroudi</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text">L'application fonctionne bien pour les gens qui ne peuvent pas se déplacer et ont besoin d'une ordonnance médicale. Meilleure expérience et moins de temps gaspillé!</p>
        </div>

        <div class="box">
            <img src="image/pic-3.png" alt="">
            <h3>Amine Souhli</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p class="text">Très pratique pour prendre son rendez-vous en ligne. Les médecins sont disponibles souvent, et la téléconsultation est très satisfaisante. Je met cinq étoiles..</p>
        </div>

    </div>

</section>

<!-- review section ends -->

<!-- blogs section starts  -->

<section class="blogs" id="blogs">

    <!-- <h1 class="heading"> Nos<span>Articles</span> </h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="image/blog-1.jpg" alt="">
            </div>
            <div class="content">
                <div class="icon">
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> by admin </a>
                </div>
                <h3>Article </h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident, eius.</p>
                <a href="#" class="btn">Plus..<span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="image/blog-2.jpg" alt="">
            </div>
            <div class="content">
                <div class="icon">
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> by admin </a>
                </div>
                <h3>Article </h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident, eius.</p>
                <a href="#" class="btn">Plus.. <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="image/blog-3.jpg" alt="">
            </div>
            <div class="content">
                <div class="icon">
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> by admin </a>
                </div>
                <h3>Article </h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident, eius.</p>
                <a href="#" class="btn">Plus.. <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>

    </div> -->

</section>

<!-- blogs section ends -->

<!-- contact section starts   -->

<section class="book" id="contact">

    <h1 class="heading">  Nous <span>Contactez</span></h1>    

    <div class="row">

        <div class="image">
            <img src="image/book-img.svg" alt="">
        </div>

        <form action="https://formsubmit.co/masante.application@gmail.com" method="POST">
            <h3>Prendre contact avec nous</h3>
            <input type="hidden" name="_subject" value="MaSanté Contact!">
            <input type="text" placeholder="votre nom" class="box" name="nom">
            <input type="text" placeholder="votre prenom" class="box" name="prenom">
            <input type="hidden" name="_next" value="https://localhost/pfe/merci.html">
            <input type="email" placeholder="votre email" class="box" name="email" required>
            <textarea class="box" name="message" required></textarea> 
            <input type="submit" value="Envoyer" class="btn" style="width:25vmin">
        </form>
    </div>
</section>

<!-- booking section ends -->


<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Liens rapids</h3>
            <a href="#home"> <i class="fas fa-chevron-right"></i> accueil </a>
            <a href="#services"> <i class="fas fa-chevron-right"></i> services </a>
            <a href="#about"> <i class="fas fa-chevron-right"></i> a propos</a>
             <a href="#specialites"> <i class="fas fa-chevron-right"></i>spécialités</a>
            <a href="#doctors"> <i class="fas fa-chevron-right"></i> médecins</a>
            <a href="#contact"> <i class="fas fa-chevron-right"></i>contact</a>
            <a href="#temoignage"> <i class="fas fa-chevron-right"></i>témoignage</a>
            <a href="#blogs"> <i class="fas fa-chevron-right"></i>articles</a>
        </div>

        <div class="box">
            <h3>Nos services</h3>
            <a href="#"> <i class="fas fa-chevron-right"></i> Prendre un rendez-vous </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> imprimmer un ordonnance </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> imprimer une facture </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> contacter un médecin</a>
            <a href="#"> <i class="fas fa-chevron-right"></i> consulter mes rendez-vous</a>
        </div>

        <div class="box">
            <h3>infos de contact</h3>
            <a href="#"> <i class="fas fa-phone"></i> +2126-12345678 </a>
            <a href="#"> <i class="fas fa-phone"></i> +2125-11223344 </a>
            <a href="#"> <i class="fas fa-envelope"></i> MaSante@gmail.com </a>
            <a href="#"> <i class="fas fa-envelope"></i> Ma_Sante@gmail.com </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Beni Mellal, maroc - 23300 </a>
        </div>

        <div class="box">
            <h3>Nous suivre</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
            <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a>
        </div>

    </div>

    <div class="credit">Projet de fin d'Etudes  <span>PFE</span> | &copy Tous Droits Réservés </div>

</section>

<!-- footer section ends -->

<!-- custom js file link  -->



<script>
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow");
    });
</script>

<script src="js/script.js"></script>

</body>
</html>