

<?php 
    session_start();
?>


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
    <!-- Header part end-->


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

    <!--================Blog Area =================-->
    <section class="blog_area section_padding">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">

                        <?php
                            $input = $_REQUEST['query'];
                            if($input=='') {
                        ?>
                        <h4>Please Enter Valid Search Query</h4>
                        <?php 
                            }
                            else {
                                //echo 'Input: ' . $input;
                                $m = new MongoDB\Driver\Manager("mongodb://127.0.0.1:27017");
                                $filter = ['name' => new \MongoDB\BSON\Regex('^')];
                                $page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                                $limit = 20;
                                $skip  = ($page - 1) * $limit;
                                $next  = ($page + 1);
                                $prev  = ($page - 1);
                                $options = ['projection' => ['_id'=>0, 'name'=>1, 'likes'=>1, 'reason'=>1, 'authors'=>1, 'url'=>1, 'year'=>1, 'venue'=>1],'skip'=>$skip];
                                /*if($_GET['random']==0) {
                                    $options = ['projection' => ['_id'=>1, 'name'=>1, 'likes'=>1, 'reason'=>1, 'authors'=>1, 'url'=>1, 'year'=>1, 'venue'=>1], 'limit'=>$limit, 'skip'=>$skip, 'sort' => ['year' => -1]];
                                }
                                else {
                                    $options = ['projection' => ['_id'=>1, 'name'=>1, 'likes'=>1, 'reason'=>1, 'authors'=>1, 'url'=>1, 'year'=>1, 'venue'=>1], 'limit'=>$limit, 'skip'=>$skip];
                                }*/
                                $query = new MongoDB\Driver\Query($filter, $options);
                                //$rows = $m->executeQuery('rlp_db.papers', $query); 
                                $counter = 0;
                                $names = [];
                                $results = [];
                                $cursor = $m->executeQuery('rlp_db.papers', $query); 
                                foreach($cursor as $r){
                                    if((stripos($r->name, $input)!== false) || (stripos($r->authors, $input)!==false) || (stripos($r->year, $input)!==false))
                                        array_push($results, [$r->name, $r->likes, $r->reason, $r->authors, $r->url, $r->year, $r->venue]);
                                }
                                $total = $page*20;
                                $pageLower = $total-20;

                                $numResults = 0;
                                $size = sizeof($results);
                                if(isset($_GET['page'])) {
                                    $numResults = sizeof($results) + ($_GET['page']-1)*20;
                                }
                                else {
                                    $numResults = sizeof($results);
                                }
                                if($numResults == 1) {
                                    $resultString = "Found " . $numResults . " result.";
                                }
                                else {
                                    $resultString = "Found " . $numResults . " results.";
                                }

                                $pageUpper = $pageLower + 20;

                                echo '<h4> ' . $resultString . '</h4><br>';
                                if($page > 1) {
                                    echo '<i class="ti-angle-left"></i><a href="?query=' . $input . '&page=' . $prev . '">Previous</a>';
                                }

                                if($pageUpper < $numResults) {
                                    echo ' <i style = "float:right" class="ti-angle-right"></i><a style = "float:right; margin-top:-3px" href="?query=' . $input . '&page=' . $next . '">Next</a>';
                                }
                                echo '<br><br>';

                                if($pageUpper > $numResults)
                                    $pageUpper = $numResults;

                                 $func = function ($val) {
                                     return mt_rand();
                                 };

                                 if(isset($_GET['page'])) {
                                    $forloopStart = $pageLower-(($_GET['page']-1) * 20);
                                    $forloopEnd = $pageUpper - (($_GET['page']-1)*20);
                                }
                                else {
                                    $forloopStart = 0;
                                    $forloopEnd = $pageUpper;
                                }
                                /* DEBUG
                                echo $forloopStart;
                                echo $forloopEnd;*/


                                if($numResults!=0) {
                                 //shuffle($allArr);
                                
                                    mt_srand('300');
                                    $order = array_map($func, range(1, count($results)));
                                    array_multisort($order, $results);

                                    for($i = $forloopStart; $i<$forloopEnd; $i++) {
                                        $entry = $results[$i];
                                        $rand = rand(0,sizeof($entry[2])-1);
                                        $reason = $entry[2][$rand];


                        ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <a class="blog_item_date">
                                    <!--<img src = "likeicon.png" style/>-->
                                    <!--<p style = "float:top;font-size:15px">published in </p>
                                    <p style="float:left;margin:0px 0px 0px 10px;font-size:24px;line-height:38px;">?php echo $entry[5]?></p>-->
                                </a>
                            </div>

                            <div class="blog_details">

                                <?php
                                if($entry[0]== "locally weighted learning and locally weighted learning for control") {
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
                                    <a class="d-inline-block" target="_blank" href= <?php echo $entry[4]?>>
                                        <h2><?php echo $entry[0]?></h2>
                                    </a>
                                <?php
                                } ?>
                                <p><b style = "color:black">Author(s): </b><?php echo $entry[3]?><br><b style = "color:black">Year Published: </b><?php echo $entry[5]?><br><b style = "color:black">Venue: </b><?php echo $entry[6]?><br><b style = "color:black">Expert Opinion: </b><?php echo $reason?></p>
                            </div>
                        </article>

                        <?php 
                            }
                            if($page > 1)
                            {
                                echo '<i class="ti-angle-left"></i><a href="?query=' . $input . '&page=' . $prev . '">Previous</a>';
                            } 

                            if($pageUpper < $numResults) {
                                echo ' <i style = "float:right" class="ti-angle-right"></i><a style = "float:right; margin-top:-3px" href="?query=' . $input . '&page=' . $next . '">Next</a>';
                            }
                            }
                        }
                            
                         ?>

                            
                    </div>
                </div>
                
	
    <div class="col-lg-4" style = "position:relative">
<!-- SOCIALS --> 
<!--
  <div class="sharediv" style="position:fixed;top:340px;right:10px;width:60px;"><button style = "background-image: url(img/facebook.png);width:50px; height:50px;" onclick = "window.open('https://www.facebook.com/sharer/sharer.php?u=www.bohg.cs.stanford.edu');
                return false;"></button>
                                <button style = "background-image: url(img/twitter.png); width:50px; height:50px;" onclick = "window.open('https://twitter.com/intent/tweet?text=I%20just%20found%20a%20great%20robot%20learning%20paper%20on%20this%20database!%20www. bohg.cs.stanford.edu'); return false;"></button>
                                    <button style = "background-image: url(img/linkedin.png); width:50px; height:50px;" onclick = "window.open('http://www.linkedin.com/shareArticle?url=bohg.cs.stanford.edu');return false;"></button>
                                    </div>-->
                        
                    <div class="blog_right_sidebar" style = "position:sticky;top:100px">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#" autocomplete = "off">
                               <div class="form-group">
                                  <div class="input-group mb-3">
                                     <input type="text" name = "query" type="text" class="form-control" placeholder= "<?php if($input == ''){ echo ' '; } else { echo $input; } ?> "onfocus="this.placeholder = ''" onblur="this.placeholder = <?php if($input == ''){echo ' '; } else { echo $input; }?>" autocomplete = "off">
                                     <div class="input-group-append">
                                        <button class="btn" type="button"><i class="ti-search"></i></button>
                                     </div>
                                  </div>
                               </div>
                               <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">Search</button>
                            </form>
                         </aside>

                        
                        <aside class="single_sidebar_widget post_category_widget">
                            <a href = "database.php?random=1" style = "text-decoration:underline">Back to Database Main Page</a>
                            
                        </aside>

                        <!-- random = 0 means chronological new to old, 
                     random = 1 means random
                     random = 2 means chronological old to new -->
                <!--
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
                </aside>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
                       
    <footer><br><br></footer>
    <!--::footer_part start::-->
               <!-- <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <P style = "text-align:center"><!- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. 
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -></P>
                        </div>
                    </div>
                    
                </div>
            </div>
        <!-::footer_part end::-->
    
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
