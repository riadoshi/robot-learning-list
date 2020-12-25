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
<style>
.teamBorder {
    border-spacing:10px;
}
</style>
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
                        <div class="search_input" id="search_input_box">
                            <div class="container ">
                                <form class="d-flex justify-content-between search-inner" action="search.php?random=0" method = "post" autocomplete = "off">
                                    <input type="text" class="form-control" id="search_input" placeholder="Search Title or Author">
                                    <button type="submit" class="btn">Search</button>
                                    <span class="btn" id="submit" title="Search"></span>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        
    </header>

    <!-- SOCIAL LINKS -->
    <div class="sharediv" style="position:fixed;top:340px;right:10px;width:60px;"><button style = "background-image: url(img/facebook.png);width:50px; height:50px;" onclick = "window.open('https://www.facebook.com/sharer/sharer.php?u=robotlearninglist.com');
                return false;"></button>
                                <button style = "background-image: url(img/twitter.png); width:50px; height:50px;" onclick = "window.open('https://twitter.com/intent/tweet?text=I%20just%20found%20a%20great%20robot%20learning%20paper%20on%20this%20database!%20 robotlearninglist.com'); return false;"></button>
                                    <button style = "background-image: url(img/linkedin.png); width:50px; height:50px;" onclick = "window.open('http://www.linkedin.com/shareArticle?url=robotlearninglist.com');return false;"></button>
                                    </div>

    <!-- BANNER -->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>A Diverse List of Robotics Learning Papers:<br>From AI Experts to You</h1>
                            <p style = "font-size:15px"> A multi-campus effort run by robotics researchers at Stanford, Facebook, University of Washington, and  Jozef Stefan Institute (Ljubljana, Slovenia). </p>
                            <form class="d-flex justify-content-between search-inner" action="search.php?random=0" method = "post" autocomplete = "off">
                                <div class = "container">
                                    <div class="search_input" id="search_input_box">
                                        <div class="container" style = "padding-bottom:30px">
                                                <input name = "query" type="text" class="form-control" id="query" placeholder="Search Title or Author">
                                        </div>
                                        <container style = "padding-right:15px">
                                            <button class="btn_2 banner_btn_2" style = "text-align:center;">Search</button>
                                        </container>

                                        <container style = "padding-left:15px">
                                            <a href="#about" style = "text-align:center;" class="btn_2 banner_btn_2">Learn More</a>
                                       </container> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ABOUT US -->
    <section class="feature_part" style="margin-top:65px;margin-bottom:-50px" name = "about" id = "about">
        <div class="section_title text-center">

                        <h1 style="margin-bottom:40px;font-size:45px;">About This Database</h2>
                    </div>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6" style="margin-bottom:170px;">
                    <img src="img/aboutus.jpg" style = "float:top; display:block; margin-left: auto; margin-right: auto;" alt ="">
                </div>
                <div class="col-lg-5">
                    <div class="feature_part_text">
                        <p>We asked robotics experts from academia and industry across the world for their top five robot learning papers. We asked for influential and impactful papers that they have not authored themselves. We received over 200 papers of interest, and are excited to share the resulting list that is diverse in terms of approaches, publication year, institution and authors as well as applications. Sorted in a variety of ways, we've made it easy for professors and students alike to learn more about this exciting field, with recommendations from the experts. </p>
                        <br><br><br><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
   <!-- WHO SHOULD USE DATABASE --> 
    <section class="use_sasu" style = "background-color:#3C92B5;padding-bottom:100px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2 style = "padding-top:80px;color:#ffffff">Who Should Use Our Database?</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <img src="img/student.png" alt="" style="width:35px;height:35px;float:left;">
                            <h4 style="text-align:left;margin-left:45px;">Students</h4>
                            <p>Current university students can use our database to discover relevant papers</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <img src="img/professor.png" alt="" style="width:35px;height:35px;float:left;">
                            <h4 style="text-align:left;margin-left:50px;">Professors</h4>
                           <p>Easily recommend the most popular, useful papers to students with practically no effort</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <img src="img/enthusiast.png" alt="" style="width:35px;height:35px;float:left;">
                            <h4 style="text-align:left;margin-left:50px;">Robot Enthusiasts</h4>
                            <p>Learn more about the current robot learning trends!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TEAM -->
     <section class="use_sasu" style = "background-color:#ffffff;color:black; padding-bottom:120px">

        <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2 style = "color:black; padding-top:80px">Team</h2>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature">
                        <div class="single_feature_part" style = "box-shadow:none; background-color:none;">
                            <img src="img/drjeannette.png" alt="" style="width:150px; height:150px; float:middle;border-radius:30px">
                            <h4 style="text-align:center">Jeannette Bohg</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature">
                        <div class="single_feature_part" style = "box-shadow:none; background-color:none;">
                            <img src="img/andrej.jpg" alt="" style="width:150px; height:150px; float:middle;border-radius:30px">
                            <h4 style="text-align:center">Andrej Gams</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature">
                        <div class="single_feature_part" style = "box-shadow:none; background-color:none;">
                            <img src="img/franziska.jpg" alt="" style="width:150px; height:150px; float:middle;border-radius:30px">
                            <h4 style="text-align:center">Franziska Meier</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" style = "padding-top:30px">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature">
                        <div class="single_feature_part" style = "box-shadow:none; background-color:none;">
                            <img src="img/byron.png" alt="" style="width:150px; height:150px; float:middle;border-radius:30px">
                            <h4 style="text-align:center">Byron Boots</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature">
                        <div class="single_feature_part" style = "box-shadow:none; background-color:none;">
                            <img src="img/riapfp.png" alt="" style="width:150px; height:150px; float:middle;border-radius:30px">
                            <h4 style="text-align:center">Ria Doshi</h4>
                        </div>
                    </div>
                </div>

            </div>

        </div>













        <!--
         <table style = "position:relative; text-align:center; margin:auto; border-collapse:separate;">
         <tbody style= "">
            <tr style = "">
                <td style = "display:inline-block; position:relative;">
                     <img src="img/drjeannette.png" alt="" style="width:200px; height:200px;">
                     <h4 style = "margin-top:10px"> Jeannette Bohg </h4>
                </td>
                <td style = "display:inline-block; position:relative;">
                     <img src="img/andrej.jpg" alt="" style="width:200px; height:200px;">
                     <h4 style = "margin-top:10px"> Andrej Gams </h4>
                </td>
                <td style = "display:inline-block; position:relative;">
                     <img src="img/franziska.jpg" alt="" style="width:200px; height:200px;">
                     <h4 style = "margin-top:10px"> Franziska Meier </h4>
                 </td>
            </tr>
            <tr style = "">
                <td style = "display:inline-block; position:relative;">
                     <img src="img/byron.png" alt="" style="width:200px; height:200px;">
                     <h4 style = "margin-top:10px"> Byron Boots </h4>
                </td>
                <td style = "display:inline-block; position:relative;">
                     <img src="img/ria.png" alt="" style="width:200px; height:200px;">
                     <h4 style = "margin-top:10px">Ria Doshi </h4>
                </td>
            </tr>
            </tbody>
        </table>
        -->


    </section>


    <!--
    <section class="use_sasu" style = "background-color:#ffffff;color:black; padding-bottom:100px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">

                        <h2 style = "color:black; padding-top:80px">Team</h2>
                    </div>
                </div>
            </div>
        </div>
        <container style = "text-align:center; display:flex;">
            <article class="blog_item" style = "box-shadow:none; float:left">
                <div class="blog_item_img">
                    <img src="img/drjeannette.png" alt="" style="width:200px; height:200px;">
                </div>
                <div class="blog_details">
                    <h4 style="text-align:center;">Jeannette Bohg</h4>
                </div>
            </article>
            <article class="blog_item" style = "box-shadow:none; float:middle">
                <div class="blog_item_img">
                    <img src="img/andrej.jpg" alt="" style="width:200px; height:200px;">
                </div>
                <div class="blog_details">
                    <h4 style="text-align:center;">Andrej Gams</h4>
                </div>
            </article>
            <article class="blog_item" style = "box-shadow:none; float:right">
                <div class="blog_item_img">
                    <img src="img/franziska.jpg" alt="" style="width:200px; height:200px">
                </div>
                <div class="blog_details">
                    <h4 style="text-align:center;">Franziska Meier</h4>
                </div>
            </article>
        </container>

        <container style = "text-align:center; display:flex;">
            <article class="blog_item" style = "box-shadow:none">
                <div class="blog_item_img">
                    <img src="img/byron.png" alt="" style="width:200px; height:200px">
                </div>
                <div class="blog_details">
                    <h4 style="text-align:center;">Byron Boots</h4>
                </div>
            </article>
            <article class="blog_item" style = "box-shadow:none">
                <div class="blog_item_img">
                    <img src="img/ria.png" alt="" style="width:200px; height:200px">
                </div>
                <div class="blog_details">
                    <h4 style="text-align:center;">Ria Doshi</h4>
                </div>
            </article>
        </container>
    -->

    <!--
    <section class="use_sasu" style = "background-color:#ffffff;color:black; padding-bottom:250px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">

                        <h2 style = "color:black; padding-top:80px">Team</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" >
                <div class="col-lg-4 col-sm-6" >
                    <div class="single_feature" >
                        <div class="single_feature_part" style = "box-shadow: none; background-color:transparent;">
                            <img src="img/drjeannette.png" alt="" style="width:200px; height:200px">
                            <h4 style="text-align:center;">Jeannette Bohg</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_feature">
                        <div class="single_feature_part" style = "box-shadow: none; background-color:transparent;">
                            <img src="img/andrej.jpg" alt="" style="width:200px; height:200px">
                            <h4 style="text-align:center;">Andrej Gams</h4>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_feature_part" style = "box-shadow: none; background-color:transparent;padding-top:50px">
                            <img src="img/franziska.jpg" alt="" style="width:200px; height:200px">
                            <h4 style="text-align:center;">Franziska Meier</h4>
                        </div>

                </div>
            </div>
            <div class="row justify-content-center" >
                <div class="col-lg-4 col-sm-6">
                    <div class="single_feature_part" style = "box-shadow: none; background-color:transparent;padding-top:125px">
                            <img src="img/byron.png" alt="" style="width:200px; height:200px;">
                            <h4 style="text-align:center;">Byron Boots</h4>
                        </div>

                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_feature_part" style = "box-shadow: none; background-color:transparent;padding-top:125px">
                            <img src="img/ria.png" alt="" style="width:200px; height:200px">
                            <h4 style="text-align:center;font-weight:2px">Ria Doshi</h4>
                        </div>

                </div>
            </div>
        </div>
    </section>-->

    </section>

    <!-- CHECK IT OUT -->
    <section class="cta_part section_padding" style = "background-image:url('img/checkusout.jpg')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="cta_text text-center">
                        <h2>Check It Out Now!</h2>
                        <p>Join professors, students, and AI enthusiasts and start learning more about the robot-learning research happening right now.</p>
                        <!--<a href="#" class="btn_2 banner_btn_1">Get Started </a>-->
                        <a style = "background-color:#3C92B5" href="database.php?random=1" class="btn_2 banner_btn_2"> Let's Go! </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
                    <!--<div class="copyright_text">
                        <P><! Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. 
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>-->
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. </P>
                    </div>-->
           
    <footer style = "background-color:#3C92B5; padding-top:10px; padding-bottom:10px; ">
    <p style = "margin-left:30px; color:#d4d0d0">Icons used from <a style = "color:#d4d0d0;text-decoration:underline" href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> via <a style = "color:#d4d0d0; " href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></p>

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
