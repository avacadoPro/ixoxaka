<?php
include 'header.php';


require 'archon/portfolio/classes/portfolio1DAL.php';
$portfolio_db=new portfolio1DAL(include('dbConfig.php'));
$portfolios=$portfolio_db->LoadAll();


require 'archon/clients/classes/clients1DAL.php';
$clients_db=new clients1DAL(include('dbConfig.php'));
$clients=$clients_db->LoadAll();


?>

<div class="top-bg" >
    <img src="img/splash-top.png" class="splash-top" alt>
    <div class="page-title zoomIn animated text-white">Portfolio</div>
</div>
 <!-- portfolio -->
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
            <?php foreach ($portfolios as $key) {?>
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
    <hr />
    
   <!-- clients -->
   <section id="clients" class="our-team padding-section">
        <div class="grid-row mt-10">
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


                                <?php foreach ($clients as $key) {  ?>

                                <div class="gallery-item picture text-center" style="height: 150px; width: auto">
                                    <div class="hover-effect"></div>
                                    <div class="link-cont">

                                        <a href="archon/<?php echo $key['image']; ?>" class="fancy fa fa-search"></a>

                                    </div>
                                    <img src="archon/<?php echo $key['image']; ?>"
                                        style="height: 150px; width: auto;    margin-left: 30%;" alt>
                                </div>

                                <?php } ?>




                            </div>
                        </div>
                    </div>

    </section>
    <hr>




<?php include 'footer.php'; ?>
	