<?php
include 'header.php';
if (isset($_GET['id'])) {
    require 'archon/lib/db.php';
    $db = new Database();
    $id=$_GET['id'];
    $blog_sql = "SELECT * FROM blog WHERE id='".$id."'";
    $blog_result = $db->select($blog_sql)[0];
} else {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
}
?>


<div class="top-bg">
		
    	<img src="img/splash-top.png" class="splash-top" alt>
		<div class="page-title zoomIn animated">single post</div>
    </div>
    
<div class="page-content" style="margin-top:20px" >
				<div class="grid-row clear">
					<div class="grid-col-row">
						<div class="grid-col grid-col-9">
							<div id="content" role="main">
								<div class="clear">
									<div class="title">
										<span class="main-title"><?php echo $blog_result['title'] ?></span>
									</div>
									<div class="post-info clear">
										<span><i class="fa fa-calendar"></i><?php echo $blog_result['dateofcreation'] ?></span>
										
									</div>
									<!-- <div class="pf-single-carousel">
										<div id="pf-single-carousel" class="owl-carousel">
											<div><img src="images/portfolio-single/pf-slide-1.jpg" alt=""></div>
											<div><img src="images/portfolio-single/pf-slide-2.jpg" alt=""></div>
											<div><img src="images/portfolio-single/pf-slide-3.jpg" alt=""></div>
										</div>
										<div class="sl-controll">
											<div class="prev"><i class="fa fa-angle-double-left"></i></div>
											<div class="next"><i class="fa fa-angle-double-right"></i></div>
										</div>
									</div> -->
									<dl>
                                    <img src="<?php echo './archon/' . $blog_result['image'] ?>"
                                    style="height:400px;width:auto;float:<?php echo ($key % 2 == 0) ? "right" : "left" ?>" />
                                        <div class="canvas">
                                            <!-- <div class="grad"></div> -->
                                        </div>
                                    </dl>
                                    <div class="content">
                                        <p> <?php echo $blog_result['content'] ?></p>
                                    </div>
								
								</div>
								
							</div>
						</div>
                    </div>
</div>