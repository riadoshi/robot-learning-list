<?php session_start(); ?>
<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Robot Learning Papers</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <!--<a class="navbar-brand" href="index.html"> <img src="img/rlp3.png" alt="logo"> </a>-->
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="database.php?random=1">Database</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="experts.php">Experts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Experts</h2>
                            <p style = "color:white; font-weight:30px; margin-top:20px">We sincerely thank all the experts who have contributed their shortlist of five important robot learning papers. Note that we requested recommendations for papers that they have not authored themselves. While we have reached out to many more people, here are the names of those who have submitted their list:</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <?php 
            $m = new MongoDB\Driver\Manager("mongodb://127.0.0.1:27017");
            $filter = ['name' => new \MongoDB\BSON\Regex('^')];
            $counter = 0;
            $options = ['projection' => ['_id'=>0, 'name'=>1],'sort' => ['name' => 1]];
            $query = new MongoDB\Driver\Query($filter, $options);
            $cursor = $m->executeQuery('rlp_db.experts', $query); 

            $c = 1;
            $size = 0;
            $count1 = 0;
            $count2 = 0;
            $count3 = 0;
            $count4 = 0;
            $names = [];

            foreach($cursor as $r){
               if($c%4==1){
                $count1++;
               }
               if($c%4==2){
                $count2++;
               }
               if($c%4==3){
                $count3++;
               }
               if($c%4==0){
                $count4++;
               }
               $c++;
               array_push($names, $r->name[0]);
            }

            $size = $c;
            $c = 0;
        ?>
        <footer class = "footer_part" style = "padding-top:40px">
        <div class = "container">
        <div class = "row" style = "text-align:center">
            <div class = "col-sm-6 col-lg-3">
            <?php while($c<$count1) { ?>
                <p><?php echo $names[$c]; ?> </p>
            <?php $c++; }?>
            </div>

            <div class = "col-sm-6 col-lg-3">
            <?php while($c<$count1+$count2) { ?>
                <p><?php echo $names[$c]; ?> </p>
            <?php $c++; } ?>
            </div>

            <div class = "col-sm-6 col-lg-3">
            <?php while($c<$count1+$count2+$count3) { ?>
                <p><?php echo $names[$c]; ?> </p>
            <?php $c++; } ?>
            </div>

            <div class = "col-sm-6 col-lg-3">
            <?php while($c<$count1+$count2+$count3+$count4) { ?>
                <p><?php echo $names[$c]; ?> </p>
            <?php $c++; } ?>
            </div>
        </div>
        </div>
	</footer>
	<br> <br>
    </section>
        
</body>
</html>



