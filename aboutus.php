<?php
include 'header.php';

require 'archon/aboutus/classes/aboutusDAL.php';
$aboutus_db=new aboutusDAL(include('dbConfig.php'));
$aboutuss=$aboutus_db->Find(1);
$aboutus=null;
foreach ($aboutuss as $key => $value) {
    $aboutus=$value;
}

require 'archon/services/classes/servicesDAL.php';
$services_db=new servicesDAL(include('dbConfig.php'));
$services=$services_db->LoadAll();


?>

<div class="top-bg" >
    <img src="img/splash-top.png" class="splash-top" alt>
    <div class="page-title zoomIn animated text-white">About Us</div>
</div>
<section id="about" class="about-us padding-section">
        <div class="grid-row">
            <div class="grid-col-row clear">
                <div class="grid-col grid-col-6 col-sd-12">
                    <!-- section title -->
                    <div class="title">
                        <span class="main-title">ABOUT US</span>
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
    <hr />
    
    <!-- services -->
    <section id="services"> 
        <div class="grid-row mt-10">
            <div class="grid-row clear">
                <div class="title">
                    <br><br><span class="main-title">Our Services</span>
                    <span class="slash-icon">/</span>

                </div>
                <div class="grid-col-row">

                    <?php foreach ($services as $key) {?>

                    <div class="item-example grid-col grid-col-3">
                        <div class="rectangle"> <i><img class="ipad" src="archon/<?php echo $key['image']; ?>" alt
                                    style="margin-left: 40%; height: 50px;"> </i> </div>
                        <h3><?php echo $key['name']; ?></h3>
                        <div class="line"></div>
                        <p><?php echo $key['description']; ?></p>
                    </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- services -->




<?php include 'footer.php'; ?>
	