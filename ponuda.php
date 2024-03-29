<?php
include("db.php");
include("sesija.class.php");
Sesija::kreirajSesiju();


    $tip = Sesija::dajKorisnika()["id_tip"];


?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UNIPU Shop</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

   <div id="top"><!-- Top Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
           </div><!-- col-md-6 offer Finish -->

           <div class="col-md-6"><!-- col-md-6 Begin -->
               <ul class="menu"><!-- cmenu Begin -->
                   <li>
                      <a href="odjava.php">Odjava</a>
                  </li>
               </ul><!-- menu Finish -->
           </div><!-- col-md-6 Finish -->
       </div><!-- container Finish -->
   </div><!-- Top Finish -->



   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       <div class="container"><!-- container Begin -->
           <div class="navbar-header"><!-- navbar-header Begin -->
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   <img src="images/UNIPU_logo.png" alt="Logo" style="height: 70px; width: 70px; margin-top: -10px">
               </a><!-- navbar-brand home Finish -->
           </div><!-- navbar-header Finish -->

           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               <div class="padding-nav"><!-- padding-nav Begin -->
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       <li>
                           <a href="index.php">Početna</a>
                       </li>
                       <li class="active">
                           <a href="ponuda.php">Ponuda</a>
                       </li>

                       <li>
                          <?php
                          if($tip == 1){
                              echo "<a href=\"dodajProizvod.php\">Dodaj proizvod</a>";
                          }
                         ?>
                      </li>
                   </ul><!-- nav navbar-nav left Finish -->
               </div><!-- padding-nav Finish -->

               <a href="košarica.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   <i class="fa fa-shopping-cart"></i>
                   <span>Proizvodi u košarici</span>
               </a><!-- btn navbar-btn btn-primary Finish -->

           </div><!-- navbar-collapse collapse Finish -->
       </div><!-- container Finish -->
   </div><!-- navbar navbar-default Finish -->



   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-3"><!-- col-md-3 Begin -->

               <?php include("sidebar.php"); ?>

           </div><!-- col-md-3 Finish -->

           <div class="col-md-9"><!-- col-md-9 Begin -->
               <div class="row"><!-- row Begin -->
                  <?php
                    if(!isset($_GET['kategorija'])){
                        if(!isset($_GET['fakultet'])){
                            $dohvatiProizvode = "select * from proizvodi order by 1 DESC";
                            $izbaciProizvode = mysqli_query($conn, $dohvatiProizvode);
                            while($row_proizvodi=mysqli_fetch_array($izbaciProizvode)){
                                    $id = $row_proizvodi['id'];
                                    $naziv = $row_proizvodi['naziv'];
                                    $cijena = $row_proizvodi['cijena'];
                                    $slika = $row_proizvodi['slika'];

                                    echo "
                                        <div class='col-md-4 col-sm-6 center-responsive'>
                                            <div class='product'>
                                                <a href='details.php?id=$id'>
                                                    <img class='img-responsive' src='images/$slika' style='height:260px'>
                                                </a>
                                                <div class='text'>
                                                    <h3>
                                                        <a href='details.php?id=$id'>$naziv</a>
                                                    </h3>

                                                <p class='price'>$cijena HRK</p>
                                                <p class='buttons'>
                                                    <a class='btn btn-default' href='details.php?id=$id'>
                                                        Više
                                                    </a>

                                                </p>
                                            </div>
                                        </div>
                                     </div>
                                    ";

                            }

                        }
                    }

                    ?>
               </div><!-- row Finish -->
            <div class="row">

            </div>
           </div><!-- col-md-9 Finish -->
       </div><!-- container Finish -->
   </div><!-- #content Finish -->

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>
</html>