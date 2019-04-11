<?php 

require 'archon/lib/db.php';
$db = new Database();

$service_sql = "SELECT * FROM services";
$service_result = $db->select($service_sql);

$clients_sql = "SELECT * FROM clients";
$clients_result = $db->select($clients_sql);

$team_sql = "SELECT * FROM team";
$team_result = $db->select($team_sql);

$portfolio_sql = "SELECT * FROM portfolio";
$portfolio_result = $db->select($portfolio_sql);

$blog_sql = "SELECT * FROM blog";
$blog_result = $db->select($blog_sql);

$aboutus_sql = "SELECT * FROM aboutus WHERE id='1'";
$aboutus_result = $db->select($aboutus_sql)[0];

$contactus_sql = "SELECT * FROM contactus WHERE id='1'";
$contactus_result = $db->select($contactus_sql)[0];

$banner_sql = "SELECT * FROM banner WHERE id='1'";
$banner_result = $db->select($banner_sql)[0];
?>

<!DOCTYPE HTML>
<html>



<head>
    <title>New</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!--styles -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/jquery.owl.carousel.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />
    <style>
    
.video-part
{
	width: 100%;
	float: left;
	position: relative;
	overflow: hidden;
    height: 800px;
    margin-bottom: 10%;
}
.video-part video
{
	margin-bottom: 15%;
	width: 100%;


}
.video-part-content
{
	position: absolute;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 100%;
	padding-top: 8%;
	background:rgba(87, 117, 189, 0.5) ;
}

.video-part-content .carousel-caption
{
	position: relative !important;
	left: 0%;
	right: 0%;
}
.video-part-content .carousel-indicators
{
	top: 316px;
}
.hader .nav.navbar-nav.pull-right
{
	margin-top: 2%;
}
.video-part-content .carousel-caption h1
{
font-size: 50px;
}
.video-part-content .carousel-caption p
{
font-size: 20px;
}
    </style>
    <!--styles -->
</head>

<body class="main-page pc">
    <!-- <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                <li>
                    <img src="images/slider/white.jpeg" alt>
                    <div class="tp-caption  sft sl-title" data-x="center" data-y="center" data-voffset="-90"
                        data-speed="700" data-start="1700" data-easing="easeOutBack"></div>
                    <p class="tp-caption sfb" data-x="center" data-y="center" data-voffset="40" data-speed="500"
                        data-start="1900" data-easing="easeOutBack"></p>
                </li>
            </ul>
            <div class="scroll-down-button">
                <img src="images/down-button.png" class="down-button" alt>
                <i class="fa fa-angle-down"></i>
            </div>
        </div>
    </div> -->
    <!-- page header -->
    <header id="home">
    <div class="video-part">
                    <video autoplay="autoplay" loop="loop" muted="muted">
                    <source src="archon/<?php echo $banner_result['videoURL'] ?>" type="video/mp4">
                    </video>
        <!-- sticky menu -->
        <div class="stick-wrapper">
            <div class="sticky clear">
                <div class="grid-row">
                   
                    
                    <!-- <img class="splash" src="img/CMS-LOGO.gif" alt="" style="margin-left: 20%;"> -->
                    <!-- <div class="logo">
						<a href="index.html"><img src="images/textlogo.png" alt="" style="margin-left: 50%;"></a>
					</div> -->
                    <!-- <nav class="nav">
						<a href="#" class="switcher">
							<i class="fa fa-bars"></i>
						</a>
						<ul class="clear">
							<li><a href="index.html" class="active-link">HOME</a></li>
							<li><a href="aboutus.html">ABOUT US</a></li>
							<li><a href="team.html">BLOGS</a></li>
							<li>
								<a href="portfolio-four-columns.html">SERVICES</a>
								<ul>
									<li><a href="portfolio-four-columns.html"><span>Four Columns</span></a></li>
									<li><a href="portfolio-tree-columns.html"><span>Three Columns</span></a></li>
									<li><a href="portfolio-two-columns.html"><span>Two Columns</span></a></li>
									<li><a href="portfolio-single-item.html"><span>Single Item</span></a></li>
								</ul>
							</li>
							<li>
								<a href="blog-with-sidebar.html">CLIENT</a>
								<ul>
									<li><a href="blog-with-sidebar.html"><span>Blog With Sidebar</span></a></li>
									<li><a href="blog-fullwidth.html"><span>Blog Full Width</span></a></li>
									<li><a href="blog-single-post.html"><span>Single Post</span></a></li>
								</ul>
							</li>
							<li><a href="shortcodes.html">CONTACT US</a></li>
						<!--	<li class="left">
								<a href="shop-product-list.html">Shop</a>
								<ul>
									<li><a href="shop-cart.html"><span>Shop Cart</span></a></li>
									<li><a href="shop-product-list.html"><span>Shop Product List</span></a></li>
									<li><a href="shop-single-product.html"><span>Shop Single Product</span></a></li>
								</ul>
							</li> !-->
                    <!-- <li class="last"><a href="contact.html">Contact</a></li> !-->
                    </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!--/ sticky menu -->
    </header>
    <!--/ pade header -->
    <!-- page content -->
    <section id="about" class="about-us padding-section">
        <div class="grid-row">
            <div class="grid-col-row clear">
                <div class="grid-col grid-col-6 col-sd-12">
                    <!-- section title -->
                    <div class="title">
                        <span class="main-title">ABOUT US</span>
                        <span class="slash-icon">/
                            <!-- <i class="fa fa-angle-double-right"></i> --></span><br />
                        <?php echo $aboutus_result['title'] ?>
                    </div>
                    <!-- section title -->
                    <dl>                       
                        <?php echo $aboutus_result['content'] ?>
                    </dl>

                </div>
                <div class="grid-col grid-col-6 content-img col-sd-12">
                    <img class="ipad" src="archon/<?php echo $aboutus_result['image'] ?>" alt>

                </div>
            </div>
        </div>
        <hr />

        <div class="grid-row clear">
            <div class="title">
                <br><br><span class="main-title">Our Services</span>
                <span class="slash-icon">/</span>

            </div>
            <div class="grid-col-row">

                <?php foreach ($service_result as $key) { ?>

                <div class="item-example grid-col grid-col-3">
                    <div class="rectangle"> <i><img class="ipad" src="archon/<?php echo $key['image']; ?>" alt
                                style="margin-left: 40%; height: 50px;"> </i> </div>
                    <h3><?php echo $key['name']; ?></h3>
                    <div class="line"></div>
                    <p><?php echo $key['description']; ?></p>
                </div>

                <?php 
            } ?>



            </div>
        </div>
    </section>


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
                            <div class="counter" data-count="675"></div>
                            <div class="counter-name">Creative Work</div>
                        </div>
                    </div>
                    <div class="grid-col grid-col-3">
                        <div class="counter-block">
                            <div class="counter" data-count="945"></div>
                            <div class="counter-name">Satisfied Clients</div>
                        </div>
                    </div>
                    <div class="grid-col grid-col-3">
                        <div class="counter-block last">
                            <div class="counter" data-count="945"></div>
                            <div class="counter-name">Cups Of Coffe</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="them-mask background-color"></div>
    </section>


    <hr>

    <br><br>


    <section id="team" class="">
        <div class="grid-row">
            <div class="title">
                <span class="main-title">OUR TEAM</span><span class="slash-icon">/<i
                        class="fa fa-angle-double-right"></i></span>
                <h5>WE ARE A LARGE TEAM</h5>
            </div>
        </div>
        <div class="grid-row large-team">
            <div class="grid-col-row clear">

                <?php foreach ($team_result as $key) { ?>

                <div class="grid-col grid-col-3">
                    <div class="team-item">
                        <div class="border-img">
                            <div class="window-tabs">
                                <div class="overflow-bloc">
                                    <div class="inform-item">

                                    </div>
                                </div><img src="archon/<?php echo $key['image']; ?>" alt>
                            </div>
                        </div>
                        <p><?php echo $key['name']; ?></p>
                    </div>
                </div>

                <?php 
            } ?>




            </div>
        </div>
    </section>


    <hr>



    <section id="team" class="our-team padding-section">
        <div class="grid-row">
            <div class="grid-col-row clear">
                <div class="grid-col-2 grid-col-10 col-sd-8">
                    <div class="title">
                        <span class="main-title">OUR CLIENT</span>
                        <span class="slash-icon">/</span><br />
                        WHO TRUST US
                        <br />
                    </div>


                    <div class="carousel-nav">
                        <div class="carousel-button">
                            <div class="prev"><i class="fa fa-chevron-left"></i></div>
                            <div class="next"><i class="fa fa-chevron-right"></i></div>
                        </div>
                        <div class="carousel-line"></div>
                    </div>

                    <br><br>

                    <div class="container-gallery">
                        <div class="grid-col-row">
                            <div id="gallery-three-items" class="owl-carousel" style="height: 150px">


                                <?php foreach ($clients_result as $key) { ?>

                                <div class="gallery-item picture text-center" style="height: 150px; width: auto">
                                    <div class="hover-effect"></div>
                                    <div class="link-cont">

                                        <a href="archon/<?php echo $key['image']; ?>" class="fancy fa fa-search"></a>

                                    </div>
                                    <img src="archon/<?php echo $key['image']; ?>" style="height: 150px; width: auto;    margin-left: 30%;"
                                        alt>
                                </div>

                                <?php 
                            } ?>




                            </div>
                        </div>
                    </div>

    </section>

    <hr>

    <section id="portfolio" class="portfolio padding-section">
        <div class="grid-row">
            <div class="portfolio-filter clear">
                <div class="title">
                    <a href="#" class="all-iso-item active" data-filter=".item">ALL</a>
                    <span class="main-title">SOCIAL MEDIA</span>
                    <span class="slash-icon">/</span>
                    <a href="#" data-filter=".photo">BRANDING</a>
                    <a href="#" data-filter=".design">WEB</a>
                    <a href="#" data-filter=".video">APP</a>
                    <a href="#" data-filter=".web">VIDEO</a>
                    <a href="#" data-filter=".music">PHOTOGRAPHY</a>

                </div>

            </div>
        </div>
        <div class="isotope">

            <?php foreach ($portfolio_result as $key) { ?>

            <div class="item design photo video web">
                <div class="portfolio-hover">
                    <div class="portfolio-info">
                        <a href="">
                            <div class="portfolio-title"><?php echo $key['title']; ?></div>
                        </a>
                        <div class="portfolio-divider"></div>
                        <div class="portfolio-description"><?php echo $key['type']; ?></div>
                    </div>
                </div>
                <img src="archon/<?php echo $key['image']; ?>" alt>
            </div>

            <?php 
        } ?>










        </div>
    </section>
    <hr>

    <section id="blog" class="padding-section">
        <div class="blog-head">
            <div class="grid-row">
                <div class="grid-col-row clear position">
                    <div class="grid-col">
                        <div class="title">
                            <span class="main-title">BLOG</span>
                            <span class="slash-icon">/</span><br />
                            LATEST FROM<br />OUR BLOG
                        </div>
                    </div>
                    <div class="grid-col grid-col-8 clear bottom">
                        <div class="years"><a href="blog-fullwidth.html">2018</a></div>
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
					
				<?php foreach ($blog_result as $key => $value) {

        ?>					
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
                                <img src="<?php echo './archon/' . $value['image'] ?>" style="height:400px;width:auto;float:<?php echo ($key % 2 == 0) ? "right" : "left" ?>"/>
                                <div class="canvas">
                                    <!-- <div class="grad"></div> -->
                                </div>
                            </div>
                        </div>

                        <div class="item-header"><br><br>
						<h2> <?php echo $value['title'] ?></h2>
                        </div>
                        <div class="content">
                            <p> <?php echo $value['content'] ?></p>
                        </div>
                        <div class="post-info clear">
                            <span><i class="fa fa-calendar"></i><?php echo $value['dateofcreation']; ?></span>
                            <!-- <span><i class="fa fa-edit"></i> Admin</span>
                            <span><i class="fa fa-comment"></i> 2 Coments</span>
                            <span><i class="fa fa-bookmark"></i> Audio</span> -->
                            <a class="button" href="#">/ READ MORE</a>
                        </div>
					</div>
				<?php 
} ?>
                   

                </div>
            </div>
        </div>
    </section>
    <--<section id="innovation" class="innovation parallaxed">
        <div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
            <img src="images/tabs/t2.jpg" alt="">
        </div>
        <div class="grid-row">
            <div class="parallax-content-third">
                <div id="client-carousel" class="owl-carousel">
                    <div>
                        <p class="testimonial-title">TESTIMONIALS</p>
                        <div class="testimonial-separator"></div>
                        <p class="testimonial-text">“Thank goodness I was never sent to school; it would have rubbed off
                            some of the originality.; it would have rubbed off some of the originality.”</p>
                        <p class="testimonial-author">- BEATRIX POTTER, AUTHOR</p>
                    </div>
                    <div>
                        <p class="testimonial-title">TESTIMONIALS</p>
                        <div class="testimonial-separator"></div>
                        <p class="testimonial-text">“Thank goodness I was never sent to school; it would have rubbed off
                            some of the originality.”</p>
                        <p class="testimonial-author">- BEATRIX POTTER, AUTHOR</p>
                    </div>
                    <div>
                        <p class="testimonial-title">TESTIMONIALS</p>
                        <div class="testimonial-separator"></div>
                        <p class="testimonial-text">“Thank goodness I was never sent to school; it would have rubbed off
                            some of the originality.”</p>
                        <p class="testimonial-author">- BEATRIX POTTER, AUTHOR</p>
                    </div>
                </div>
            </div>
        </div>
        </section> !-->
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
                        <p><?php echo $contactus_result['address'] ?></p>
                    </div>
                </div>
                <div class="grid-contact">
                    <i class="fa fa-phone"></i>
                    <div class="contact-content">
                        <div class="kind-contact">Customer Care:</div>
                        <p><a href="tel:<?php echo $contactus_result['phoneNo'] ?>"><?php echo $contactus_result['phoneNo'] ?></a></p>
                    </div>
                </div>
                <div class="grid-contact">
                    <i class="fa fa-envelope-o"></i>
                    <div class="contact-content">
                        <div class="kind-contact">General Email:</div>
                        <p><a href="mailto:<?php echo $contactus_result['email'] ?>"><?php echo $contactus_result['email'] ?></a></p>
                    </div>
                </div>
                <div class="grid-contact">
                    <i class="fa  fa-power-off"></i>
                    <div class="contact-content">
                        <div class="kind-contact">Work Time:</div>
                        <p><?php echo $contactus_result['workTime'] ?></p>
                    </div>
                </div>
            </div><br><br>




            <div class="mapouter">
                <div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas"
                        src="https://maps.google.com/maps?q=Global%20Business%20center%2C%20dubai&t=&z=13&ie=UTF8&iwloc=&output=embed"
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
                    <form action="#" class="clear">
                        <input type="email" placeholder="Your Email Address">
                        <button type="submit" class="button-send">Send</button>
                    </form>
                </div>
            </div>
        </section>
        <!--/ page content -->
        <!-- page footer -->
        <footer id="footer">
            <div class="grid-row clear">
                <div class="footer">
                    <div id="copyright">Copyright<span> COORDINATOR MARKETING & SERVICES</span> 2016-All Rights Reserved
                    </div>
                    <a href="index.html" class="footer-logo"><img
                            src="images/slider/9ef32698-8604-46dd-83fc-fe5241fc4b04.jpg" alt=""></a>
                    <!-- <div class="social">
						<a href="#"><div class="contact-round"><i class="fa fa-twitter"></i></div></a>
						<a href="#"><div class="contact-round"><i class="fa fa-facebook"></i></div></a>
						<a href="#"><div class="contact-round"><i class="fa fa-skype"></i></div></a>
						<a href="#"><div class="contact-round"><i class="fa fa-rss"></i></div></a>
						<a href="#"><div class="contact-round"><i class="fa fa-linkedin"></i></div></a>
					</div> -->
                </div>
            </div>
        </footer>
        <!--/ page footer -->
        <a href="#" id="scroll-top" class="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- scripts -->
        <script src="js/jquery.min.js"></script>
        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
        <script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
        <script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.layeranimation.min.js">
        </script>
        <script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
        <script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript"
            src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox_packed.js"></script>
        <script src="js/main.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/jquery.owl.carousel.js"></script>
        <script src="js/jquery.fancybox.pack.js"></script>
        <script src="js/jquery.fancybox-media.js"></script>
        <script src="js/retina.min.js"></script>
        <!--/ scripts -->
</body>

</html>