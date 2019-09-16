<?php
include("db.php");
include("skripta.php");
include("sesija.class.php");
Sesija::kreirajSesiju();

if(Sesija::dajKorisnika() == null ){
	header("Location: http://localhost/php_dwa/prijava.php");
	die();
}
else {
    $tip = Sesija::dajKorisnika()["id_tip"];
    $idK = Sesija::dajKorisnika()["id"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UNIPU Shop</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>

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
                       <li class="active">
                           <a href="index.php">Početna</a>
                       </li>
                       <li>
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


    <div id="hot"><!-- zadnje dodano block -->
       <div class="box"><!-- box Begin -->
           <div class="container"><!-- container Begin -->
               <div class="col-md-12"><!-- col-md-12 Begin -->
                   <h2 style="color: #BFBC31">NOVI PROIZVODI</h2>
               </div><!-- col-md-12 Finish -->
           </div><!-- container Finish -->
       </div><!-- box Finish -->
   </div><!-- zadnje dodano block kraj -->


    <div id="container" class="container" style="margin-top:5%; margin-left: 15%">
        <div class="row">
            <?php
                dohvatiNoveProizvode();
            ?>
        </div>
    </div>

</body>
</html>