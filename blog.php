<?php
include 'header.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
	require 'archon/blog/classes/blogDAL.php';
	$blog_db=new blogDAL(include('dbConfig.php'));
	$blogs=$blog_db->Find($id);
    $blog=null;
    $tags=null;
	foreach ($blogs as $key => $value) {
        $blog=$value;
        $tags=explode(",",$value["tags"]);
	}
} else {
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
}
?>

<div class="top-bg" >
    <img src="img/splash-top.png" class="splash-top" alt>
    <div class="page-title zoomIn animated text-white"><?php echo $blog['title'] ?></div>
</div>

<div class="page-content">
    <div class="grid-row clear mt-10" >
        <div class="grid-col-row">
            <div class="grid-col grid-col-9">
                <div id="content" role="main">
                    <div class="clear">
                        <div class="title">
                            <span class="main-title"><?php echo $blog['title'] ?></span>
                        </div>
                        <div class="post-info clear">
                            <span><i
                                    class="fa fa-calendar"></i><?php echo " Posted ".$blog['dateofcreation']." by ".$blog['arthor']; ?></span>

                        </div>
                       
                        <dl>
                            <div
                                style="background-image:url('<?php echo './archon/' . $blog['image'] ?>');height: 500px; background-repeat: no-repeat;">
                            </div>
                            <div class="canvas">
                            </div>
                        </dl>
                        <div class="content mt-4">
                            <p> <?php echo $blog['content'] ?></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- sidebar -->
					<aside class="grid-col grid-col-3 sidebar">
					
						
						<div class="widget widget-calendar">
							<div class="widget-title">Calendar</div>
							<div id="calendar"></div>
						</div>
						<!-- widget calendar -->
						<hr class="divider-green">
						
						<!-- widget tag cloud -->
						<div id="tag_cloud-2" class="widget widget_tag_cloud">
							<div class="widget-title">Tags</div>
							<div class="tagcloud">
								<ul>
                                    <?php foreach ($tags as $key => $value) {
                                      echo '<li><a href="#">'.$value.'</a></li>';
                                    } ?>
								</ul>
							</div>
						</div>
						<!-- widget tag cloud -->
						<hr class="divider-green">
						<!-- widget follow subscribe -->
						<div id="text-3" class="widget widget_text">
							<div class="widget-title">Follow & subscribe</div>
							<div class="textwidget">
								<div class="follow-icon">
									<a href="#"><div class="contact-round blue-follow-icon"><i class="fa fa-twitter"></i></div></a>
									<a href="#"><div class="contact-round hot-follow-icon"><i class="fa fa-rss"></i></div></a>
									<a href="#"><div class="contact-round blue-follow-icon"><i class="fa fa-skype"></i></div></a>
									<a href="#"><div class="contact-round red-follow-icon"><i class="fa fa-youtube"></i></div></a>
									<a href="#"><div class="contact-round blue-follow-icon"><i class="fa fa-facebook"></i></div></a>
								</div>
							</div>
						</div>
						<!-- widget follow subscribe -->
					</aside>
					<!-- sidebar -->
	</div>
</div>
<?php include 'footer.php'; ?>
	