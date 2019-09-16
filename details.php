<?php
include("db.php");
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

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $dohvatiProizvod = "select * from proizvodi where id='$id'";
    $izbaciProizvod = mysqli_query($conn,$dohvatiProizvod);
    $row_proizvod = mysqli_fetch_array($izbaciProizvod);

    $id = $row_proizvod['id'];
    $naziv = $row_proizvod['naziv'];
    $cijena = $row_proizvod['cijena'];
    $slika = $row_proizvod['slika'];
    $opis = $row_proizvod['opis'];

}
else {
    $id = 0;
    $naziv = "Nepoznato";
    $cijena = "Nepoznato";
    $slika = "Nepoznato";
    $opis = "Nepoznato";
}

if(isset($_POST['dodaj'])){
    $c_kolicina = $_POST['product_qty'];
    $c_velicina = $_POST['product_size'];

    if($c_kolicina !=''&& $c_velicina !='') {
        $insert = "insert into kosarica (kolicina, velicina, id_korisnik, id_proizvod, status) values ('$c_kolicina','$c_velicina','$idK', '$id', 'K')";
        //$insert = "insert into kosarica (id_korisnik, id_proizvod) values ('$idK', '$id')";
        $run = mysqli_query($conn,$insert);
        header("Location: http://localhost/php_dwa/ponuda.php");
        die();
    }
    else{
        echo "<script>alert('Nisu uneseni svi podaci!')</script>";
    }
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
                          <a href="dodajProizvod.php">Dodaj proizvod</a>
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



   <div class="col-sm-9">
        <div id="productMain" class="row">

        <div class="col-sm-6"><!-- col-sm-6 Begin -->
           <div class="item active">
               <center><img class="img-responsive" src="images/<?php echo $slika; ?>" alt="Pro1" style="height:320px"></center>
           </div>
       </div><!-- col-sm-6 Finish -->


        <div class="col-sm-6"><!-- col-sm-6 Begin -->
           <div class="box"><!-- box Begin -->
               <h1 class="text-center"><?php echo $naziv; ?></h1>
                   <form action="details.php?id=<?php echo $id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                      <div class="form-group"><!-- form-group Begin -->
                          <label for="" class="col-md-5 control-label">Količina:</label>
                          <div class="col-md-7"><!-- col-md-7 Begin -->
                                <select name="product_qty" class="form-control"><!-- select Begin -->
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                                 <option value="5">5</option>
                                 </select><!-- select Finish -->
                          </div><!-- col-md-7 Finish -->
                       </div><!-- form-group Finish -->

                       <div class="form-group"><!-- form-group Begin -->
                           <label class="col-md-5 control-label">Veličina:</label>
                           <div class="col-md-7"><!-- col-md-7 Begin -->
                                   <select name="product_size" class="form-control"><!-- form-control Begin -->
                                       <option value="S">S</option>
                                       <option value="M">M</option>
                                       <option value="L">L</option>
                                       <option value="XL">XL</option>
                                   </select><!-- form-control Finish -->
                           </div><!-- col-md-7 Finish -->
                       </div><!-- form-group Finish -->

                      <p class="price" style="text-align: center; font-size: large"><?php echo $cijena; ?> HRK</p>
                      <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart" type="submit" name="dodaj">Dodaj u košaricu</button></p>
                   </form><!-- form-horizontal Finish -->
           </div><!-- box Finish -->



        <div class="box" id="details"><!-- box Begin -->
            <h4>Detalji proizvoda</h4>
            <p><?php echo $opis; ?></P>
            <h4>Dostupne veličine:</h4>
               <ul>
                   <li>S</li>
                   <li>M</li>
                   <li>L</li>
                   <li>XL</li>
               </ul>
               <hr>
       </div><!-- box Finish -->



        </div><!-- container Finish -->
   </div><!-- #content Finish -->
   <script src="js/jquery-331.min.js"></script>
   <script src="js/bootstrap-337.min.js"></script>
</body>
</html>