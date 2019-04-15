<?php
include 'header.php';
if (isset($_GET['id'])) {
    require 'archon/lib/db.php';
    $db = new Database();
    $id=$_GET['id'];
	require 'archon/blog/classes/blogDAL.php';
	$blog_db=new blogDAL(include('dbConfig.php'));
	$blogs=$blog_db->Find($id);
	$blog=null;
	foreach ($blogs as $key => $value) {
		$blog=$value;
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
	</div>
</div>
<?php include 'footer.php'; ?>
	