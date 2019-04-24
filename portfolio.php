<?php
include 'header.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
	require 'archon/portfolio/classes/portfolio1DAL.php';
	$portfolio_db=new portfolio1DAL(include('dbConfig.php'));
	$portfolios=$portfolio_db->Find($id);
    $portfolio=null;
    $categories=[];
	foreach ($portfolios as $key => $value) {
        $portfolio=$value;
        $categories=explode(",",$value['categoriesComma']);
    }
    
} else {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
}
?>

<div class="top-bg" >
    <img src="img/splash-top.png" class="splash-top" alt>
    <div class="page-title zoomIn animated text-white"><?php echo $portfolio['title'] ?></div>
</div>

<div class="page-content">
    <div class="grid-row clear mt-10" >
        <div class="grid-col-row">
            <div class="grid-col grid-col-9">
                <div id="content" role="main">
                    <div class="clear">
                        <div class="title">
                            <span class="main-title"><?php echo $portfolio['title'] ?></span>
                        </div>
                        
						<hr class="divider-green">
                       
                        <div class="post-info clear">
                           

                        </div>
                       
                        <dl>
                            <div
                                style="background-image:url('<?php echo './archon/' . $portfolio['image'] ?>');height:800px; background-repeat: no-repeat;background-position: cover;">
                            </div>
                            <!-- <image url="<?php echo './archon/' . $portfolio['image'] ?>" style="height:auto;width:100%"/> -->
                            <div class="canvas">
                            </div>
                        </dl>
                        <div class="content mt-4">
                            <p> <?php echo $portfolio['type'] ?></p>
                            <!-- <a href="portfolios.php">Back to portfolios</a> -->
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- sidebar -->
					<aside class="grid-col grid-col-3 sidebar" style="    margin-top: 7em;">
						<!-- widget search -->
						<!-- widget categories -->
						<div id="categories" class="widget widget_categories">
							<div class="widget-title">Categories</div>
							<ul>
                                <?php foreach ($categories as $key => $value) {
                                   echo '<li class="cat-item cat-item-1 current-cat"><a href="#">'.$value.' </li>';
                                } ?>
								
							</ul>
                        </div>
					</aside>
					<!-- sidebar -->
	</div>
</div>


<?php include 'footer.php'; ?>
	