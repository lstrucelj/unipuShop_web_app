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

?>