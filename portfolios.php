<?php
include 'header.php';


require 'archon/portfolio/classes/portfolio1DAL.php';
$portfolio_db=new portfolio1DAL(include('dbConfig.php'));
$portfolios=$portfolio_db->LoadAll();


require 'archon/portfolioCategories/classes/portfolioCategoriesDAL.php';
$portfolioCategories_db=new portfolioCategoriesDAL(include('dbConfig.php'));
$portfolioCategories=$portfolioCategories_db->LoadAll();

require 'archon/clients/classes/clients1DAL.php';
$clients_db=new clients1DAL(include('dbConfig.php'));
$clients=$clients_db->LoadAll();


?>
<div class="top-bg">
    <img src="img/splash-top.png" class="splash-top" alt>
    <div class="page-title zoomIn animated text-white">Portfolio</div>
</div>



 <section id="portfolio" class="portfolio">
    <div class="grid-row">
      <div class="portfolio-filter clear">
        <div class="title">
          <a href="#" class="active" data-filter=".item" style="float:right">ALL</a>
          <span class="main-title">PORTFOLIO</span>
          <span class="slash-icon">/</span>
          <?php foreach ($portfolioCategories as $key => $value) {
                    echo '<a href="#" data-filter=".'.$value['title'].'">'.strtoupper($value['title']).'</a>';
                } ?>
         
        </div>
      </div>
    </div>
    <div class="grid-row">
      <div class="grid-col-row">
        <div class="isotope portfolio-three-columns">
            <?php foreach ($portfolios as $key) {
               
                    ?>
                <div class="item <?php echo $key['categories']; ?>" style="width:25em;height:300px;padding:10px;background-color:white">
                    <div class="portfolio-hover">
                        <div class="portfolio-info">
                            <a href="portfolio.php?id=<?php echo $key['id']; ?>">
                                <div class="portfolio-title"><?php echo $key['title']; ?></div>
                            </a>
                            <!-- <div class="portfolio-divider"></div>
                            <div class="portfolio-description"><?php echo $key['type']; ?></div> -->
                        </div>
                    </div>
                    <div style="background-image:url('archon/<?php echo $key['image']; ?>');    height: 300px;width: auto;background-size: cover;background-position: center;background-repeat: no-repeat;"></div>
                </div>

        <?php
                
            } ?>
       
         
        </div>
      </div>
    </div>
  </section>

<br><br><br><br>

<?php include 'footer.php'; ?>
	