<?php
include("db.php");
include("sesija.class.php");
Sesija::kreirajSesiju();
$idK = Sesija::dajKorisnika()["id"];

if(isset($_POST['order'])){
    $promijeniStatus = "update kosarica set status='N' where id_korisnik = '$idK' and status = 'K'";
    $run_customer = mysqli_query($conn,$promijeniStatus);

    //echo "<script>alert('Narudžba je uspješno izvršena!')</script>";

    header("Location: http://localhost/php_dwa/index.php");
    die();
}

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
                       <li>
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



   <div id="content"><!-- content Begin -->
       <div class="container"><!-- container Begin -->
            <div id="cart" class="col-md-9"> <!-- col-md-9 Begin -->
                <div class="box">
                    <form action="košarica.php" method="post" enctype="multipart/from-data">
                        <h1>Košarica</h1>

                        <?php

                            $dohvatiKosaricu = "select * from kosarica where id_korisnik = '$idK' and status='K'";
                            $izbaciKosaricu = mysqli_query($conn, $dohvatiKosaricu);
                            $count = mysqli_num_rows($izbaciKosaricu);


                        ?>


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Proizvod</th>
                                        <th>Količina</th>
                                        <th>Cijena</th>
                                        <th>Veličina</th>
                                        <th colspan="1">Izbriši</th>
                                        <th colspan="2">Ukupno</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $total = 0;
                                        while($row_kosarica = mysqli_fetch_array($izbaciKosaricu)){
                                            $id = $row_kosarica['id_proizvod'];
                                            $kolicina = $row_kosarica['kolicina'];
                                            $velicina = $row_kosarica['velicina'];
                                            $ukupno = 0;
                                            $dohvatiProizvod = "select * from proizvodi where id = '$id'";
                                            $izbaciProizvod = mysqli_query($conn, $dohvatiProizvod);
                                            while($row_proizvod = mysqli_fetch_array($izbaciProizvod)){
                                                $naziv = $row_proizvod['naziv'];
                                                $slika = $row_proizvod['slika'];
                                                $cijena = $row_proizvod['cijena'];
                                                $ukupno_pro = $cijena * $kolicina;
                                                $ukupno += $ukupno_pro;
                                                $total += $ukupno_pro;



                                    ?>

                                    <tr>
                                        <td><img src="images/<?php echo $slika; ?>" alt="Proizvod 1a"></td>
                                        <td><a href="details.php/id=$id"><?php echo $naziv; ?></a></td>
                                        <td><?php echo $kolicina; ?></td>
                                        <td><?php echo $cijena; ?> HRK</td>
                                        <td><?php echo $velicina; ?></td>
                                        <td><input type="checkbox" name="remove[]" value="<?php echo $id; ?>"></td>
                                        <td><?php echo $ukupno; ?>.00 HRK</td>
                                    </tr>

                                    <?php
                                        }
                                            }
                                    ?>
                                </tbody>


                            </table>
                        </div>

                        <div class="box-footer"><!-- box-footer Begin -->
                           <div class="pull-left"><!-- pull-left Begin -->
                               <a href="ponuda.php" class="btn btn-default"><!-- btn btn-default Begin -->
                                   <i class="fa fa-chevron-left"></i> Nastavi kupovinu
                               </a><!-- btn btn-default Finish -->
                           </div><!-- pull-left Finish -->

                           <div class="pull-right"><!-- pull-right Begin -->
                               <button type="submit" name="update" value="azurirajKosaricu" class="btn btn-default"><!-- btn btn-default Begin -->
                                   <i class="fa fa-refresh"></i> Ažuriraj košaricu
                               </button><!-- btn btn-default Finish -->
                               <button type="submit" name="order" class="btn btn-primary">
                                   Naruči <i class="fa fa-chevron-right"></i>
                               </button>
                           </div><!-- pull-right Finish -->
                       </div><!-- box-footer Finish -->
                    </form>
                </div>

                <?php
                    function azurirajKosaricu(){
                        global $conn;

                        if(isset($_POST['update'])){
                            foreach($_POST['remove'] as $remove_id){
                                $izbrisiProizvod = "delete from kosarica where id_proizvod = '$remove_id'";
                                $izbaciIzbrisi = mysqli_query($conn, $izbrisiProizvod);
                                if($izbaciIzbrisi){
                                    echo "<script>window.open('košarica.php', '_self')</script> ";
                                }
                            }
                        }
                    }
                    echo  @$azuriraj = azurirajKosaricu();

                ?>

            </div>  <!-- col-md-9 Finish -->


            <div class="col-md-3"><!-- col-md-3 Begin -->
                   <div id="order-summary" class="box"><!-- box Begin -->
                       <div class="box-header"><!-- box-header Begin -->
                           <h3>Detalji narudžbe</h3>
                       </div><!-- box-header Finish -->

                       <div class="table-responsive"><!-- table-responsive Begin -->
                           <table class="table"><!-- table Begin -->
                               <tbody><!-- tbody Begin -->
                                   <tr><!-- tr Begin -->
                                       <td> Iznos </td>
                                       <th><?php echo $total; ?>.00 HRK</th>
                                   </tr><!-- tr Finish -->

                                   <tr><!-- tr Begin -->
                                       <td> Dostava </td>
                                       <td> 00.00 HRK </td>
                                   </tr><!-- tr Finish -->

                                   <tr class="total"><!-- tr Begin -->
                                       <td> Ukupno </td>
                                       <th><?php echo $total; ?>.00 HRK </th>
                                   </tr><!-- tr Finish -->
                               </tbody><!-- tbody Finish -->
                           </table><!-- table Finish -->
                       </div><!-- table-responsive Finish -->
                   </div><!-- box Finish -->
                </div><!-- col-md-3 Finish -->

       </div><!-- container Finish -->
  </div><!-- content Finish -->

   <script src="js/jquery-331.min.js"></script>
   <script src="js/bootstrap-337.min.js"></script>
</body>
</html>