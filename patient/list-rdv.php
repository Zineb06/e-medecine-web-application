<?php
include "profil.php";
include "../connexion.php";
$pat_id=$_SESSION['pat_id'];
$req="select r.*, m.* from medecin m, rdv r where r.inp=m.inp and r.cin='$pat_id' order by r.id desc  ";
$res=mysqli_query($conx,$req);
// $row=mysqli_fetch_assoc($res);
if(mysqli_num_rows($res)>0){
?>
<html lang="en"> 
<head>
  <meta charset="UTF-8" />
  <title>Liste Des Rendez-Vous</title>
  <link rel="stylesheet" href="list-rdv.css"/>
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <style> 
    .attendance{ height: 85vh; overflow-y: auto; } 
    .table .fa{ margin-left: 6px; }
</style>
</head>
<body>
     
        <div class="tst">
          <h1>Mes Rendez-Vous</h1>
          <table class="table">
            <thead>
              <tr>
              	<th>ID</th>
                <th>Médecin</th>
                <th>Spécialité</th>
                <th>Date</th>
                <th>Horaire</th>
                <th>Etat</th>
                 <th>Opération</th>
                <th>Contacter</th>
                <th>Facture</th>
                <th>Ord</th>
              </tr>
            </thead>
            <tbody>
<?php while($row=mysqli_fetch_array($res)){
       // $_SESSION['inp']=$row['inp']; 
 ?>            
              <tr>
              	<td><?php echo $row['id']; ?></td>
                <td>
                    <?php echo $row['nom_complet']; ?>
                </td>
                <td><?php echo $row['specialite']; ?></td>
                <td><?php echo $row['date_rdv']; ?></td>
                <td><?php echo $row['temps']; ?></td>
<!-- etat -->   <td>
                 <?php if($row['etat']=="en demande"){ ?>      
                  <b style="color:orange"><?php echo $row['etat']; ?>&nbsp </b>
                <?php } ?>

                  <?php if($row['etat']=="confirmé"){ ?>      
                  <b style="color:green"><?php echo $row['etat']; ?>&nbsp </b>
                <?php } ?>

                  <?php if($row['etat']=="annulé"){ ?>      
                  <b style="color:red"><?php echo $row['etat']; ?>&nbsp </b>
                <?php } ?>

                  <?php if($row['etat']=="terminé"){ ?>      
                  <b style="color:gray"><?php echo $row['etat']; ?>&nbsp </b><?php } ?>
                
                </td>

                <td>
                  <?php if($row['etat']=="en demande"){ ?>      
                   <a href="annuler-rdv.php?id=<?php echo $row['id'];?>" id="cancel" class="btn btn-danger" >
                   <i class="fa fa-times-circle"></i>
                <?php } ?>

                  <?php if($row['etat']=="confirmé"){ ?>      
                   <a href="annuler-rdv.php?id=<?php echo $row['id'];?>" id="cancel" class="btn btn-danger" >
                   <i class="fa fa-times-circle"></i>
                <?php } ?>

                  <?php if($row['etat']=="annulé"){ ?>      
                   <a href="supprimer_rdv.php?id=<?php echo $row['id'];?>" id="cancel" class="btn btn-warning" >
                   <i class="fa fa-trash"></i>
                <?php } ?>

                  <?php if($row['etat']=="terminé"){ ?> 
               <a href="supprimer_rdv.php?id=<?php echo $row['id'];?>" id="cancel" class="btn btn-warning" >
                   <i class="fa fa-trash"></i>
                  <?php } ?>
                </td>

                <td>
                   <a href="chatbox.php?inp=<?php echo $row['inp'];?>" class="btn btn-primary" >
                   <i class="fa fa-envelope"></i>
                  
                </td>

<!-- facture --> <td>
                  <?php if( $row['etat']=="terminé" ){ ?>
                  <a href="facture/facture.php?id=<?php echo $row['id']; ?>" class="btn btn-info" >Voir</a>
                  <?php }else{echo "-----";} ?>
                </td>

                <td>
                  <?php if($row['etat']=="terminé"){ ?>
                  <a href="ordonnance.php?id=<?php echo $row['id'];?>" class="btn btn-info">Voir</a>
                  <?php }else{echo "-----";} ?>
                </td>
              </tr>   
     <?php } ?>     
            </tbody>
          </table>
      </section>
    </section>

  <?php } ?>

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