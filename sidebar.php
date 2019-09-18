<?php include("skripta.php"); ?>

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
<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
    <div class="panel-heading"><!-- panel-heading Begin -->
        <h3 class="panel-title">Kategorije proizvoda</h3>
    </div><!-- panel-heading Finish -->
    
    <div class="panel-body"><!-- panel-body Begin -->
        <ul class="nav nav-pills nav-stacked category-menu"><!-- nav nav-pills nav-stacked category-menu Begin -->

            <?php dohvatiKategorije(); ?>


        </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
    </div><!-- panel-body Finish -->
</div><!-- panel panel-default sidebar-menu Finish -->


<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
    <div class="panel-heading"><!-- panel-heading Begin -->
        <h3 class="panel-title">Fakulteti</h3>
    </div><!-- panel-heading Finish -->
    
    <div class="panel-body"><!-- panel-body Begin -->
        <ul class="nav nav-pills nav-stacked category-menu"><!-- nav nav-pills nav-stacked category-menu Begin -->

            <?php dohvatiFakultete(); ?>

        </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
    </div><!-- panel-body Finish -->
</div><!-- panel panel-default sidebar-menu Finish -->

</body>
</html>