<?php session_start(); ?>

<!doctype html>
<html lang="zxx">

<head>
 <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-135082016-3"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

         gtag('config', 'UA-135082016-3');
        </script>

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
                            <h2>Database</h2>
                            <p style = "color:white; font-weight:30px; margin-top:20px">What's Shown: Each paper's bibliographic information and one randomly chosen expert opinion from the potentially many that were provided.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- DATABASE -->
    <section class="blog_area section_padding" >
        <div class="container col-md-pull-4">
            <div class="row flex-column-reverse flex-lg-row" style = "">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                       
                        <!-- FB STUFF -->
                        <div id="fb-root"></div>
                          <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                            fjs.parentNode.insertBefore(js, fjs);
                          }(document, 'script', 'facebook-jssdk'));</script>
                         

                        <!-- DB STUFF -->
                        <?php
                            $shuffled = false;
                            $m = new MongoDB\Driver\Manager("mongodb://127.0.0.1:27017");
                            $filter = ['name' => new \MongoDB\BSON\Regex('^')];
                            $counter = 0;
                            $page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                            $limit = 20;
                            $skip  = ($page - 1) * $limit;
                            $next  = ($page + 1);
                            $prev  = ($page - 1);
                            // random = 0 means newest to oldest so sort accordingly
                            if($_GET['random']==0) {
                                $options = ['projection' => ['_id'=>1, 'name'=>1, 'likes'=>1, 'reason'=>1, 'authors'=>1, 'url'=>1, 'year'=>1, 'venue'=>1], 'limit'=>$limit, 'skip'=>$skip, 'sort' => ['year' => -1]];
                            }
                            // random = 2 means oldest to newest so sort accordingly
                            else if($_GET['random']==2) {
                                $options = ['projection' => ['_id'=>1, 'name'=>1, 'likes'=>1, 'reason'=>1, 'authors'=>1, 'url'=>1, 'year'=>1, 'venue'=>1], 'limit'=>$limit, 'skip'=>$skip, 'sort' => ['year' => 1]];
                            }
                            // if random = 1, then sort is random
                            else {
                                $options = ['projection' => ['_id'=>1, 'name'=>1, 'likes'=>1, 'reason'=>1, 'authors'=>1, 'url'=>1, 'year'=>1, 'venue'=>1], 'limit'=>$limit, 'skip'=>$skip];
                            }
                            $query = new MongoDB\Driver\Query($filter, $options);
                            $cursorSize = $m->executeQuery('rlp_db.papers', $query);
                            $cursor = $m->executeQuery('rlp_db.papers', $query); 
                            $size = 0;
                            $allArr = []; // array of the [id, name, likes, reason, author, url]
                            /* find size of # page entries & push all values to an array for storage */
                            foreach($cursorSize as $r){
                                $size = $size+1;
                                array_push($allArr, [$r->_id, $r->name, $r->likes, $r->reason, $r->authors, $r->url,$r->year, $r->venue]);
                            }


                            /* determine and conduct sorting */
                            $sortVal = 0;
                            $random = 0;
                            $func = function ($val) {
                                return mt_rand();
                            };

                            /* sorts the elements by year */
                            function sortByYear($x, $y) {
                                return (int)$x[6] - (int)$y[6];
                            } 

                        
                            /*if($_GET["random"]==0) {
                                $random = 0;
                                usort($allArr, 'sortByYear');
                                // sort by year
                            }

                            else {*/
                            if($_GET["random"]==1){
                                $random = 1;
                                if(isset($_GET["page"]) ) {
                                    $sortVal = ($_GET["sortVal"]);
                                    mt_srand($sortVal);
                                } 
                                else {
                                    $sortVal = rand(1,300);
                                    mt_srand($sortVal);
                                    
                                }
                                $order = array_map($func, range(1, count($allArr)));
                                array_multisort($order, $allArr);
                            }
                            if($_GET["random"]==2) {
                                $random = 2;
                            }

                                /*}
                            } */

                            /**
                            $collection = 'papers';
                            $cursor = $m->executeQuery('rlp_db.papers', $query)->skip($skip)->limit($limit);
                            */
                            if($page > 1) {
                                    echo '<i class="ti-angle-left"></i><a href="?page=' . $prev . '&sortVal=' . $sortVal . '&random= ' . $random . '">Previous</a>';
                                } 

                            if($page < $size) {
                                echo ' <i style = "float:right" class="ti-angle-right"></i><a style = "float:right; margin-top:-3px" href="?page=' . $next . '&sortVal=' . $sortVal . '&random=' . $random . '">Next</a>';
                            }
                            echo '<br><br>';

                            $total= 0;
                            /*$func = mt_rand();
                            echo $func;*/

                            //shuffle($allArr);
                    
                            foreach($allArr as $r){
                                $total = $total +1;
                                $rand = rand(0,sizeof($r[3])-1);
                                $reason = $r[3][$rand];
                        ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <a class="blog_item_date">
                                </a>
                            </div>

                            <div class="blog_details">
                                <?php
                                if($r[1]== "locally weighted learning and locally weighted learning for control") {
                                ?>

                                    <a class="d-inline-block" href= "http://citeseerx.ist.psu.edu/viewdoc/download?doi=10.1.1.69.1772&rep=rep1&type=pdf" target="_blank">
                                        <h2 style = "display:inline">locally weighted learning</h2>
                                    </a>
                                    <h2 style = "display:inline" href = ""> and </h2>
                                    <a href= "http://citeseerx.ist.psu.edu/viewdoc/download?doi=10.1.1.70.8672&rep=rep1&type=pdf" style = "display:inline" target="_blank">
                                        <h2 style = "display:inline">locally weighted learning for control</h2>
                                    </a><br><br>

                                <?php
                                }
                                else {
                                ?>
                                    <a class="d-inline-block" target="_blank" href= <?php echo $r[5]?>>
                                        <h2><?php echo $r[1]?></h2>
                                    </a>
                                <?php
                                } ?>
                                <p><b style = "color:black;font-weight:400">Author(s): </b><?php echo $r[4]?><br><b style = "color:black;font-weight:400">Venue: </b> <?php echo $r[7]?><br><b style = "color:black;font-weight:400">Year Published: </b> <?php echo $r[6]?><br><b style = "color:black;font-weight:400">Expert Opinion: </b><?php echo $reason?></p>
                                
                            </div>
                        </article>

                            <?php 
                                if(($total%20==0 or $page == 8) && $total>=20)
                                { 
                                    if($page > 1)
                                    {
                                        echo '<i class="ti-angle-left"></i><a href="?page=' . $prev . '&sortVal=' . $sortVal . '&random= ' . $random . '">Previous</a>';
                                    } 
                                    if($page<8) {
                                        echo ' <i style = "float:right" class="ti-angle-right"></i><a style = "float:right; margin-top:-3px" href="?page=' . $next . '&sortVal=' . $sortVal . '&random=' . $random . '">Next</a>';
                                    }
                                    
                                }
                            $counter++; ?>

                        <?php }?>

                    </div>
                </div>

        <div class="col-lg-4 col-lg-pull-4" style = "position:relative">
                
            <div class="blog_right_sidebar order-md-first" style = "position:sticky; top:100px; padding-bottom:5px">

                <aside class="single_sidebar_widget search_widget">
                    <form action="search.php?random=0" method = "post" autocomplete="off">
                       <div class="form-group">
                          <div class="input-group mb-3">
                             <input type="text" name = "query" id = "search1" class="form-control" placeholder='Search Title or Author'
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search For A Paper'">
                             <div class="input-group-append">
                                <button class="btn" type="button"><i class="ti-search"></i></button>
                             </div>
                          </div>
                       </div>
                       <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">Search</button>
                    </form>
                 </aside>
                
                <!-- random = 0 means chronological new to old, 
                     random = 1 means random
                     random = 2 means chronological old to new -->
                <aside class="single_sidebar_widget post_category_widget">
                    <h4 class="widget_title">Sort</h4>
                    <ul class="list cat-list">
                        <li>
                            <?php 
                                if($_GET['random']!=1) {
                                    echo '<a href="?random=1" class="d-flex"><p>Random</p></a>';
                                } else {
                                    echo '<p><b style = "color:#5c5c5c">Random</b></p>';
                                }
                            ?>
                        </li>
                        <li>
                            <?php 
                                if($_GET['random']==0) {
                                    echo '<p><b style = "color:#5c5c5c">Newest to Oldest</b></p>';
                                } else {
                                    echo '<a href="?random=0" class="d-flex"><p>Newest to Oldest</p></a>';
                                }
                            ?>
                        </li>
                        <li>
                            <?php 
                                if($_GET['random']==2) {
                                    echo '<p><b style = "color:#5c5c5c">Oldest to Newest</b></p>';
                                } else {
                                    echo '<a href="?random=2" class="d-flex"><p>Oldest to Newest</p></a>';
                                }
                            ?>
                        </li>
                    </ul>
                </aside>
            </div>                
        </div>
    </section>

    <script>
    function doFB() {
        FB.ui({ method: 'share', href: 'https://developers.facebook.com/docs/', }, function(response){});
    }
    </script>
    

                       
    <!--================Blog Area =================-->

    <!--::footer_part start::-->
    <footer>
    <br><br>      
    </footer>
        <!--::footer_part end::-->
    
        <!-- jquery plugins here-->
        <!-- jquery -->
        <script src="js/jquery-1.12.1.min.js"></script>
        <!-- popper js -->
        <script src="js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- easing js -->
        <script src="js/jquery.magnific-popup.js"></script>
        <!-- swiper js -->
        <script src="js/swiper.min.js"></script>
        <!-- swiper js -->
        <script src="js/masonry.pkgd.js"></script>
        <!-- particles js -->
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.nice-select.min.js"></script>
        <!-- slick js -->
        <script src="js/slick.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/contact.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/mail-script.js"></script>
        <!-- custom js -->
        <script src="js/custom.js"></script>
    </body>
    
    </html>
