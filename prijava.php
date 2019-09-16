<!DOCTYPE html>

<?php
include("db.php");
include("sesija.class.php");
Sesija::kreirajSesiju();

if(Sesija::dajKorisnika() != null ){
	header("Location: http://localhost/php_dwa/index.php");
	die();
}

if(isset($_POST['login'])){
    $korime = $_POST['ime'];
	$p_lozinka = $_POST['lozinka'];

	if($korime !=''&& $p_lozinka !='') {
            $upit="SELECT * FROM korisnik WHERE ime = '$korime' LIMIT 1";
            $nadiKorisnika = mysqli_query($conn, $upit);
            $imaKorisnika=0;
            while($row_korisnik=mysqli_fetch_array($nadiKorisnika)){
                $imaKorisnika=1;
            }

            if($imaKorisnika==1){
                        $upit2="SELECT * FROM korisnik WHERE ime = '$korime' AND lozinka = '$p_lozinka' LIMIT 1";
                        $nadiKorisnika2 = mysqli_query($conn, $upit2);
                        $imaKorisnika2=0;
                        while($row_korisnik2=mysqli_fetch_array($nadiKorisnika2)){
                            $imaKorisnika2=1;
                            $korisnik=$row_korisnik2;
                        }
                        if($imaKorisnika2==1){
                              Sesija::kreirajKorisnika($korisnik);
                              header("Location: http://localhost/php_dwa/index.php");
                              die();
                        }
                        else{
                            echo "<script>alert('Korisnička lozinka je pogrešna!')</script>";
                        }
            }
            else{
                echo "<script>alert('Korisnik nije registriran!')</script>";
            }
    }
    else{
         echo "<script>alert('Nisu uneseni svi podaci!')</script>";
    }
}
?>

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
                          <a href="registracija.php">Registracija</a>
                      </li>

                      <li>
                          <a href="prijava.php">Prijava</a>
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
              <h2 style="color: #BFBC31; text-decoration: bold">UNIPU Shop</h2>
          </div><!-- container Finish -->
      </div><!-- navbar navbar-default Finish -->


   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->

           <div class="col-md-9" style="margin-left: 10%; margin-top:3%"><!-- col-md-9 Begin -->
               <div class="box"><!-- box Begin -->
                   <div class="box-header"><!-- box-header Begin -->
                       <center><!-- center Begin -->
                           <h2>Prijavi se</h2>
                       </center><!-- center Finish -->
                       <form action="prijava.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                           <div class="form-group"><!-- form-group Begin -->
                               <label>Korisničko ime</label>
                               <input type="text" class="form-control" name="ime" required>
                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->
                               <label>Lozinka</label>
                               <input type="password" class="form-control" name="lozinka" required>
                           </div><!-- form-group Finish -->

                           <div class="text-center"><!-- text-center Begin -->
                               <button type="submit" name="login" class="btn btn-primary"></i>Prijavi se</button>
                           </div><!-- text-center Finish -->
                       </form><!-- form Finish -->
                   </div><!-- box-header Finish -->
               </div><!-- box Finish -->
           </div><!-- col-md-9 Finish -->
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>

</body>
</html>


