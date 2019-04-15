<?php
include 'header.php';



require 'archon/team/classes/teamDAL.php';
$team_db=new teamDAL(include('dbConfig.php'));
$team=$team_db->LoadAll();

?>

<div class="top-bg" >
    <img src="img/splash-top.png" class="splash-top" alt>
    <div class="page-title zoomIn animated text-white">Our Team</div>
</div>

  <section id="team" class="">
        <div class="grid-row ">
            <div class="title">
                <span class="main-title">OUR TEAM</span><span class="slash-icon">/<i
                        class="fa fa-angle-double-right"></i></span>
                <h5>WE ARE A LARGE TEAM</h5>
            </div>
        </div>
        <div class="grid-row large-team">
            <div class="grid-col-row clear mt-10">

                <?php foreach ($team as $key) {  ?>

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

                <?php  } ?>




            </div>
        </div>
    </section>




<?php include 'footer.php'; ?>
	