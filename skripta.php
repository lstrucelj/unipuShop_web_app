<?php

$db = mysqli_connect("localhost", "root", "", "unipudb");


function dohvatiNoveProizvode(){
    global $db;

    $dohvatiProizvod = "select * from proizvodi order by 1 DESC LIMIT 4";
    $izbaciProizvod = mysqli_query($db, $dohvatiProizvod);

    while($row_proizvod = mysqli_fetch_array($izbaciProizvod)){

        $id = $row_proizvod['id'];
        $naziv = $row_proizvod['naziv'];
        $cijena = $row_proizvod['cijena'];
        $slika = $row_proizvod['slika'];

        echo "
            <div class='col-md-4 col-sm-6 single'>
                <div class='product'>
                    <a href='details.php?id=$id'>
                        <img class='img-responsive' src='images/$slika' style='height:180px'>
                    </a>
                    <div class='text'>
                        <h3>
                            <a href='details.php?id=$id'>
                                $naziv
                            </a>
                        <h3>
                        <p class='price'>
                            $cijena HRK
                        </P>
                        <p class='button'>
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


function dohvatiKategorije(){
    global $db;

    $dohvatiKategoriju = "select * from kategorija";
    $izbaciKategoriju = mysqli_query($db, $dohvatiKategoriju);

    while($row_kategorija=mysqli_fetch_array($izbaciKategoriju)){

        $id = $row_kategorija['id'];
        $naziv = $row_kategorija['naziv'];

        echo "
            <li>
                <a href='ponuda.php?id'> $naziv </a>
            </li>
        ";
    }
}


function dohvatiFakultete(){
    global $db;

    $dohvatiFakultet = "select * from fakulteti";
    $izbaciFakultet = mysqli_query($db, $dohvatiFakultet);

    while($row_fakultet=mysqli_fetch_array($izbaciFakultet)){

        $id = $row_fakultet['id'];
        $naziv = $row_fakultet['naziv'];

        echo "
            <li>
                <a href='ponuda.php?id'> $naziv </a>
            </li>
        ";
    }
}

/*
function prikazProKategorije(){
    global $db;

    if(isset($_GET['kategorija'])){
        $id = $_GET['kategorija'];
        $dohvatiProKat = "select * from kategorija where kategorija ='$id'";
        $izbaciProKat = mysqli_query ($db, $dohvatiProKat);
        $row_ProKat = mysqli_fetch_array($izbaciProKat);

        $naziv = $row_ProKat['naziv'];
        $dohvati_Pro = "select * from proizvodi where kategorija = '$id'";
        $izbaciPro = mysqli_query($db, $dohvatiPro);

        $count = mysqli_num_rows($izbaciPro);

        if($count==0){
            echo "
                <div class='box'>
                    <h1>Ne postoji ni jedan proizvod u ovoj kategoriji!</h1>
                </div>
            ";
        }
        else{
            echo"
                <div class='box'>
                    <h1>$naziv</h1>

                </div>
            ";
        }

        while($row_proizvod=mysqli_fetch_array($izbaciPro)){
            $id = $row_proizvod['id'];
            $naziv = $row_proizvod['naziv'];
            $cijena = $row_proizvod['cijena'];
            $slika = $row_proizvod['slika'];

            echo"
                <div class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'>
                        <a href='details.php?id=$id'>
                            <img class='img-responsive' src='images/$slika' style='height:180px'>
                        </a>
                        <div class='text'>
                            <h3>
                                <a href='details.php?id=$id'>
                                    $naziv
                                </a>
                            <h3>
                            <p class='price'>
                                $cijena
                            </P>
                            <p class='button'>
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


function prikazProFakulteti(){
    global $db;

    if(isset($_GET['fakulteti'])){
        $id = $_GET['fakultet'];
        $dohvatiFakultete = "select * from fakulteti where id = '$id'";
        $izbaciFakultete = mysqli_query($db, $dohvatiFakultete);
        $row_fakulteti = mysqli_fetch_array($izbaciFakultete);
        $naziv = $row_fakulteti['naziv'];

        $dohvatiFakultete = "select * from proizvodi where id = '$id'";
        $izbaciProizvode = mysqli_query($db, $dohvatiFakultete);
        $count = mysqli_num_rows($izbaciProizvode);

        if($count == 0){
            echo "
                <div class='box'>
                    <h1>Ne postoji ni jedan proizvod pod ovim fakultetom!</h1>
                </div>
            ";
        }
        else{
            echo "
                <div class='box'>
                    <h1>$naziv</h1>

                </div>
            ";
        }

        while($row_fakulteti=mysqli_fetch_array($izbaciProizvode)){
            $id = $row_fakulteti['id'];
            $naziv = $row_fakulteti['naziv'];
            $cijena = $row_fakulteti['cijena'];

            $slika = $row_fakulteti['slika'];

            echo"
                <div class='col-md-4 col-sm-6 center-responsive'>
                    <div class='product'>
                        <a href='details.php?id=$id'>
                            <img class='img-responsive' src='images/$slika' style='height:180px'>
                        </a>
                        <div class='text'>
                            <h3>
                                <a href='details.php?id=$id'>
                                    $naziv
                                </a>
                            <h3>
                            <p class='price'>
                                $cijena
                            </P>
                            <p class='button'>
                              <a class='btn btn-default' href='details.php?id=$id'>
                                  Više
                              </a>

                              <a class='btn btn-primary' href='details.php?id=$id'>
                                  <i class='fa fa-shopping-cart'></i> Dodaj u košaricu
                              </a>
                            </p>
                        </div>
                    </div>
                </div>
            ";
        }
    }
}
*/
?>