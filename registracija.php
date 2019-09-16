<?php
include("db.php");
include("sesija.class.php");
Sesija::kreirajSesiju();

if(isset($_POST['register'])){
    $c_name = $_POST['ime'];
    $c_email = $_POST['email'];
    $c_pass = $_POST['lozinka'];

    if($c_name !=''&& $c_email !=''&& $c_pass !='') {
        $upit="SELECT * FROM korisnik WHERE ime = '$c_name' LIMIT 1";
        $nadiKorisnika = mysqli_query($conn, $upit);
        $imaKorisnika=0;
        while($row_korisnik=mysqli_fetch_array($nadiKorisnika)){
            $imaKorisnika=1;
        }

        if($imaKorisnika==0){
                $insert_customer = "insert into korisnik (ime, email, lozinka, id_tip) values ('$c_name','$c_email','$c_pass', 2)";
                $run_customer = mysqli_query($conn,$insert_customer);
                header("Location: http://localhost/php_dwa/prijava.php");
                die();
        }
        else{
            echo "<script>alert('Korisničko ime je zauzeto!')</script>";
        }
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
                           <h2> Kreiraj novi račun</h2>
                       </center><!-- center Finish -->
                       <form action="registracija.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                           <div class="form-group"><!-- form-group Begin -->
                               <label>Korisničko ime</label>
                               <input type="text" class="form-control" name="ime" required>
                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->
                               <label>Email</label>
                               <input type="text" class="form-control" name="email" required>
                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->
                               <label>Lozinka</label>
                               <input type="password" class="form-control" name="lozinka" required>
                           </div><!-- form-group Finish -->

                           <div class="text-center"><!-- text-center Begin -->
                               <button type="submit" name="register" class="btn btn-primary"></i>Registriraj se</button>
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
