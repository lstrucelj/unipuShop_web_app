<?php
include("db.php");

?><!DOCTYPE html>
<html>
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
                       <li>
                           <a href="ponuda.php">Ponuda</a>
                       </li>

                       <li class="active">
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


    <div id="hot"><!-- zadnje dodano block -->
       <div class="box"><!-- box Begin -->
           <div class="container"><!-- container Begin -->
               <div class="col-md-12"><!-- col-md-12 Begin -->
                   <h2 style="color: #BFBC31">DODAJ PROIZVOD</h2>
               </div><!-- col-md-12 Finish -->
           </div><!-- container Finish -->
       </div><!-- box Finish -->
   </div><!-- zadnje dodano block kraj -->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Naziv proizvoda</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="naziv" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Kategorija proizvoda</label>
                            <div class="col-md-6">
                                <select name="kategorija" class="form-control">
                                    <option>Odaberite kategoriju proizvoda</option>
                                    <?php
                                        $get_kategorija = "select * from kategorija";
                                        $run_kategorija = mysqli_query($conn, $get_kategorija);
                                         while($row_kategorija=mysqli_fetch_array($run_kategorija)){
                                            $id = $row_kategorija['id'];
                                            $naziv = $row_kategorija['naziv'];

                                            echo "
                                                <option value='$id'>$naziv</option>
                                            ";
                                         }
                                    ?>


                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Fakulteti</label>
                            <div class="col-md-6">
                                <select name="fakultet" class="form-control">
                                    <option>Odaberite fakultet</option>
                                    <?php
                                        $dohvati_fakultet = "select * from fakulteti";
                                        $odaberi_fakultet = mysqli_query($conn, $dohvati_fakultet);
                                         while($row_fakultet=mysqli_fetch_array($odaberi_fakultet)){
                                            $id = $row_fakultet['id'];
                                            $naziv = $row_fakultet['naziv'];

                                            echo "
                                                <option value='$id'>$naziv</option>
                                            ";
                                         }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Slika</label>
                            <div class="col-md-6">
                                <input class="form-control" type="file" name="slikaDodaj" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Cijena</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="cijena" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Opis</label>
                            <div class="col-md-6">
                                <textarea name="opis" cols="19" rows="8" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input name="submit" value="Dodaj proizvod" class="btn btn-primary form-control" type="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>
</html>

<?php

if(isset($_POST['submit'])){
    $naziv = $_POST['naziv'];
    $kategorija = $_POST['kategorija'];
    $fakultet = $_POST['fakultet'];
    $cijena = $_POST['cijena'];
    $opis = $_POST['opis'];

    $slikaDodaj = $_FILES['slikaDodaj']['name'];
    $tempNaziv = $_FILES['slikaDodaj']['tmp_name'];

    move_uploaded_file($tempNaziv, "images/$slikaDodaj");

    $dodaj_proizvod = "insert into proizvodi (kategorija, fakultet, datum, naziv, slika, cijena, opis)
                       values ('$kategorija', '$fakultet', NOW(), '$naziv', '$slikaDodaj', '$cijena', '$opis')";

    $dohvati_proizvod = mysqli_query($conn, $dodaj_proizvod);

    if($dohvati_proizvod){
        echo "<script>alert('Proizvod je uspješno dadan!')</script>";
        echo "<script>window.open('dodajProizvod.php', '_self')</script>";
    }

}

?>