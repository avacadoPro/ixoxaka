<?php
ini_set('display_errors', 1); 


require 'archon/services/classes/servicesDAL.php';
$services_db=new servicesDAL(include('dbConfig.php'));
$services=$services_db->LoadAll();

require 'archon/clients/classes/clients1DAL.php';
$clients_db=new clients1DAL(include('dbConfig.php'));
$clients=$clients_db->LoadAll();



require 'archon/team/classes/teamDAL.php';
$team_db=new teamDAL(include('dbConfig.php'));
$team=$team_db->LoadAll();



require 'archon/portfolioCategories/classes/portfolioCategoriesDAL.php';
$portfolioCategories_db=new portfolioCategoriesDAL(include('dbConfig.php'));
$portfolioCategories=$portfolioCategories_db->LoadAll();

require 'archon/portfolio/classes/portfolio1DAL.php';
$portfolio_db=new portfolio1DAL(include('dbConfig.php'));
$portfolios=$portfolio_db->LoadAll();


require 'archon/blog/classes/blogDAL.php';
$blogs_db=new blogDAL(include('dbConfig.php'));
$blogs=$blogs_db->LoadAll();

require 'archon/aboutus/classes/aboutusDAL.php';
$aboutus_db=new aboutusDAL(include('dbConfig.php'));
$aboutuss=$aboutus_db->Find(1);
$aboutus=null;
foreach ($aboutuss as $key => $value) {
    $aboutus=$value;
}


require 'archon/contactus/classes/contactusDAL.php';
$contactus_db=new contactusDAL(include('dbConfig.php'));
$contactuss=$contactus_db->Find(1);
$contactus=null;
foreach ($contactuss as $key => $value) {
    $contactus=$value;
}


require 'archon/banner-content/classes/banner_contentDAL.php';
$banner_db=new banner_contentDAL(include('dbConfig.php'));
$banners=$banner_db->Find(1);
$banner=null;
foreach ($banners as $key => $value) {
    $banner=$value;
}

require 'archon/funfacts/classes/funfactsDAL.php';
$funfacts_db=new funfactsDAL(include('dbConfig.php'));
$funfacts=$funfacts_db->Find(1);
$funfact=null;
foreach ($funfacts as $key => $value) {
    $funfact=$value;
}


require 'archon/testimonials/classes/testimonialsDAL.php';
require 'archon/Mail/Mailer.php';
require 'archon/subscribers/classes/subscribersDAL.php';
require 'archon/subscribers/classes/subscribersBAL.php';

$testimonials_db=new testimonialsDAL(include('dbConfig.php'));
$testimonials=$testimonials_db->LoadAll();
$scubscribers_db=new subscribersDAL(include('dbConfig.php'));
$scubscriber=new subscribersBAL();
if (isset($_POST['submit'])) {
    $scubscriber->email=$_POST['email'];
    $scubscribers_db->Add($scubscriber);
    $mailer=new Mailer();
    $mailer->sendme("New user Subscribed",$scubscriber->email." subscribed on CMS.qa");
    $mailer->send($scubscriber->email,"Thank you for Subscribing","Thank you for subscribe us stay tunned for more updates.");


    echo "<script type='text/javascript'>alert('Subscribed!')</script>";
}
include 'header.php'
?>

<style>
    

    </style>

    <!-- video -->
    
        <?php if($banner['contentType']=="Video"){
            ?>
            <section class="video-part">
                <video autoplay="autoplay" playsinline autoplay muted loop>
                    <source src="archon/<?php echo $banner['contentURL'] ?>" type="video/mp4" >
                </video>
         </section>
        <?php
        }else{
            ?>
            <div style="background-image:url('archon/<?php echo $banner['contentURL'] ?>')" class="bannerImage">
        </div>

        <?php
        }?>

    
    <!-- video -->

    <!-- about -->
    <hr id="about" style="width: 86%;margin-left: 7%;">
    <section  class="about-us padding-section"  >
        <div class="grid-row">
            <div class="grid-col-row clear" >
                <div class="grid-col grid-col-6 col-sd-12"  >
                    <!-- section title -->
                    <div class="title"  >
                        <span class="main-title" >ABOUT US</span>
                        <span class="slash-icon">/
                            <!-- <i class="fa fa-angle-double-right"></i> --></span><br />
                        <?php echo $aboutus['title'] ?>
                    </div>
                    <!-- section title -->
                    <dl>
                        <?php echo $aboutus['content'] ?>
                    </dl>

                </div>
                <div class="grid-col grid-col-6 content-img col-sd-12">
                    <img class="ipad" src="archon/<?php echo $aboutus['image'] ?>" alt>

                </div>
            </div>
        </div>       
    </section>     
    <hr id="services">
    <!-- about -->

    <!-- services -->
    <section >
        <div class="grid-row">
            <div class="grid-row clear">
                <div class="title">
                    <br><br><span class="main-title">Our Services</span>
                    <span class="slash-icon">/</span>

                </div>
                <div class="grid-col-row">

                    <?php foreach ($services as $key) {  ?>

                    <div class="item-example grid-col grid-col-3">
                        <div class="rectangle"> <i><img class="ipad" src="archon/<?php echo $key['image']; ?>" alt
                                    style="margin-left: 40%; height: 50px;"> </i> </div>
                        <h3><?php echo $key['name']; ?></h3>
                        <div class="line"></div>
                        <p><?php echo $key['description']; ?></p>
                    </div>

                    <?php  } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- services -->

    <!-- funfacts -->
    <section class="fun-facts parallaxed">
        <div class="parallax-image" data-parallax-left="0.5" data-parallax-top="1.5" data-parallax-scroll-speed="0.5">
            <img src="images/team/parallax-4.jpg" alt="">
        </div>
        <div class="grid-row wow fadeIn">
            <div class="parallax-content-third">
                <div class="clear table">
                    <div class="grid-col-3 title-innovation">
                        <div class="innovation-header">Fun<br />facts
                            <div class="slash-line"></div>
                        </div>
                    </div>
                    <div class="grid-col grid-col-3">
                        <div class="counter-block">
                            <div class="counter" data-count="<?php echo $funfact['creativeWork'] ?>"></div>
                            <div class="counter-name">Creative Work</div>
                        </div>
                    </div>
                    <div class="grid-col grid-col-3">
                        <div class="counter-block">
                            <div class="counter" data-count="<?php echo $funfact['satisfiedClients'] ?>"></div>
                            <div class="counter-name">Satisfied Clients</div>
                        </div>
                    </div>
                    <div class="grid-col grid-col-3">
                        <div class="counter-block last">
                            <div class="counter" data-count="<?php echo $funfact['cupsofcoffee'] ?>"></div>
                            <div class="counter-name">Cups Of Coffee</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="them-mask background-color" id="team"></div>
    </section>
    <!-- funfacts -->
   
    <hr>
    <!-- team -->    
    <section>
        <div class="grid-row">
                <div class="title">
                    <span class="main-title">OUR TEAM</span><span class="slash-icon">/<i
                            class="fa fa-angle-double-right"></i></span>
                    <h6 style="display: inherit;">LET US KICK START YOUR BUSINESS</h6>
                </div>
            </div>
        <div class="scrolling-wrapper">
        
        <?php foreach ($team_db->LoadAll() as $key) {  ?>
            <div class="cardd">
                <div style="background-image: url('archon/<?php echo $key['image']; ?>');height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;border-radius: 100%;"></div>
                <p class="centerText"><?php echo $key['name']; ?></p>       
            </div>
        <?php  } ?>
        
        </div>
    </section>
<hr>

 

 <section id="portfolio" class="portfolio">
    <div class="grid-row">
      <div class="portfolio-filter clear">
        <div class="title">
          <a href="#" class="active" data-filter=".item" style="float:right">ALL</a>
          <a class="main-title">PORTFOLIO</a>
          <span class="slash-icon">/</span>
          <?php foreach ($portfolioCategories as $key => $value) {
                    echo '<a href="#" data-filter=".'.$value['title'].'">'.strtoupper($value['title']).'</a>';
                } ?>
         
        </div>
      </div>
    </div>
    <div class="grid-row">
      <div class="grid-col-row">
        <div class="isotope">
            <?php 
            $portfolioCount=0;
            foreach ($portfolios as $index=>$key) {  if ($key['visibleonhome']==1&&$portfolioCount<=12) {
                ?>
        <div class="item <?php echo $key['categories']; ?>" >
            <div class="portfolio-hover">
                <div class="portfolio-info">
                    <a href="portfolio.php?id=<?php echo $key['id']; ?>">
                        <div class="portfolio-title"><?php echo $key['title']; ?></div>
                    </a>
                    <!-- <div class="portfolio-divider"></div>
                    <div class="portfolio-description"><?php echo $key['type']; ?></div> -->
                </div>
            </div>
            <img src="archon/<?php echo $key['image']; ?>" alt>
            </div>

        <?php
            $portfolioCount++;}} ?>
       
         
        </div>
      </div>
    </div>
  </section>



    <hr>
    <!-- portfolio -->

    <!-- blog -->
    <section id="blog" class="padding-section">
        <div class="blog-head">
            <div class="grid-row">
                <div class="grid-col-row clear position">
                    <div class="grid-col">
                        <div class="title">
                            <a class="main-title" href="blogs.php">BLOG</a>
                            <span class="slash-icon">/</span><br />
                            LATEST FROM<br />OUR BLOG
                        </div>
                    </div>
                    <div class="grid-col grid-col-8 clear bottom">
                        <div class="years"><a href="blog-fullwidth.html"> <?php echo date("Y"); ?></a></div>
                        <div class="slash">/</div>
                        <!--<div class="years"><a href="blog-fullwidth.html">2015</a></div>
                                <div class="slash">/</div>
                                <div class="years"><a href="blog-fullwidth.html">2014</a></div> !-->
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-content">
            <div class="grid-row">
                <div class="blog">

                    <?php                    
                    $blogCount=1;
                     foreach ($blogs as $key => $value) {  if ($value['visibleonhome']==1&&$blogCount<=3) {?>
                    <div class="item clear">
                        <!-- <div class="date-round" style="opacity: 0.2;">
                                    <div class="date-mounth">
                                        <span>17</span>
                                        <p>Oct</p>
                                    </div>
                                </div> -->
                        <div class="media-block <?php echo ($key % 2 == 0) ? "left" : "right" ?>-block">
                            <?php
                                    echo ($key % 2 == 0) ? '<img id="splash-4" src="img/splash-4.png" alt>' : ''
                                    ?>
                            <div class="picture">
                                <!-- <div class="hover-effect">
                                            
                                        </div>
                                        <div class="link-cont">
                                            <a href="blog-single-post.html" class="cws-slide-left fa fa-share-alt"></a>
                                            <a href="images/11.jpg" class="fancy fa fa-search"></a>
                                            <a href="blog-single-post.html" class="cws-slide-right fa fa-heart"></a>
                                        </div> -->
                                <img src="<?php echo './archon/' . $value['image'] ?>"
                                    style="width:100%;float:<?php echo ($key % 2 == 0) ? "right" : "left" ?>" />
                                <div class="canvas">
                                    <!-- <div class="grad"></div> -->
                                </div>
                            </div>
                        </div>

                        <div class="item-header"><br><br>
                            <a href="blog.php?id=<?php echo $value['id'];?>"><h2> <?php echo $value['title'] ?></h2></a>
                        </div>
                        <div class="content">
                            <p> <?php echo $value['shortcontent'] ?></p>
                        </div>
                        <div class="post-info clear">
                            <span>
                                <i class="fa fa-user"></i>
                                <?php echo " ".$value['arthor']; ?>
                                <i class="fa fa-calendar"></i>
                                <?php echo " ".date("d-m-Y", strtotime($value['dateofcreation'])); ?>
                            </span>
                           
                            <a class="button" href="blog.php?id=<?php echo $value['id'];?>">/ READ MORE</a>
                        </div>
                    </div>
                    <?php $blogCount++;} } ?>


                </div>
            </div>
        </div>
    </section>
    <!-- blog -->
    
   
    <!-- #endregion Jssor Slider End -->

    <!-- clients -->
    <section id="clients" class="our-team padding-section">
        <div class="grid-row">
            <div class="grid-col-row clear">
                <div class="grid-col-2 grid-col-10 col-sd-8">
                    <div class="title">
                        <span class="main-title">OUR CLIENT</span>
                        <span class="slash-icon">/</span><br />
                        WHO TRUST US
                        <br />
                    </div>
                    <div id="jssor_1"
                        style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:100px;overflow:hidden;visibility:hidden;">
                        <!-- Loading Screen -->
                        <div data-u="loading" class="jssorl-009-spin"
                            style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;"
                                src="../svg/loading/static-svg/spin.svg" />
                        </div>
                        <div data-u="slides"
                            style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:100px;overflow:hidden;">
                            <?php foreach ($clients as $key => $value) { ?>
                                <div>
                                    <img data-u="image" src="<?php echo './archon/' . $value['image'] ?>" />
                                </div>
                                <?php  } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <!-- clients -->

    <!-- testimonials -->
    <section id="testimonials" class="innovation parallaxed">
        <div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
            <img src="images/tabs/t2.jpg" alt="">
        </div>
        <div class="grid-row">
            <div class="parallax-content-third">
                <div id="client-carousel" class="owl-carousel">
                    <?php foreach ($testimonials as $key => $value) {?>
                    <div>
                        <p class="testimonial-title">TESTIMONIALS</p>
                        <div class="testimonial-separator"></div>
                        <p class="testimonial-text"> <?php echo  $value['text']?></p>
                        <p class="testimonial-author">- <?php echo  $value['author']?></p>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </section> 
    <!-- testimonials -->

    <!-- contact -->
    <section id="contact" class="contact padding-section">
        <div class="contact-head">
            <div class="grid-row">
                <div class="title">
                    <span class="main-title">CONTACT</span> <span class="slash-icon">/
                        <!-- <i class="fa fa-angle-double-right"></i> --></span>
                    <h5>GET IN TOUCH WITH US</h5>
                </div>
            </div>
        </div> <br>
        <div class="grid-row clear">
            <div class="grid-contact">
                <i class="fa  fa-globe"></i>
                <div class="contact-content">
                    <div class="kind-contact">Where we are:</div>
                    <p><?php echo $contactus['address'] ?></p>
                </div>
            </div>
            <div class="grid-contact">
                <i class="fa fa-phone"></i>
                <div class="contact-content">
                    <div class="kind-contact">Customer Care:</div>
                    <p><a
                            href="tel:<?php echo $contactus['phoneNo'] ?>"><?php echo $contactus['phoneNo'] ?></a>
                    </p>
                </div>
            </div>
            <div class="grid-contact">
                <i class="fa fa-envelope-o"></i>
                <div class="contact-content">
                    <div class="kind-contact">General Email:</div>
                    <p><a
                            href="mailto:<?php echo $contactus_result['email'] ?>"><?php echo $contactus['email'] ?></a>
                    </p>
                </div>
            </div>
            <div class="grid-contact">
                <i class="fa  fa-power-off"></i>
                <div class="contact-content">
                    <div class="kind-contact">Work Time:</div>
                    <p><?php echo $contactus['workTime'] ?></p>
                </div>
            </div>
        </div><br><br>




        <div class="mapouter">
            <div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas"
                    src="https://maps.google.com/maps?q=Global%20Business%20center%2C%20Qatar&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                    href="https://www.crocothemes.net">crocothemes</a></div>
            <style>
                .mapouter {
                    position: relative;
                    text-align: right;
                    height: 500px;
                    width: 100%;
                }

                .gmap_canvas {
                    overflow: hidden;
                    background: none !important;
                    height: 500px;
                    width: 100%;
                }
            </style>
        </div>




        <!-- <div class="map">
                        <div id="map" class="google-map"></div>
                    </div> -->
        <div class="subscribe">
            <div class="grid-row clear">
                <div class="them-mask"></div>
                <div class="subscribe-header">subscribe</div>
                <form action="#" class="clear" method="post">
                    <input type="text" name="email" placeholder="Your Email Address" required />
                    <input type="submit" name="submit" value="Send" style="width: 100px;" class="button-send" />
                </form>
            </div>
        </div>
    </section>
    <!-- contact -->


<?php include 'footer.php'; ?>