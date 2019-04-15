<?php
$classname="testimonialsDAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.php';
});
$classname="testimonialsBAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.php';
});
$dal=new testimonialsDAL(null);
include '../Header1.php';
$objBAL=new testimonialsBAL();
if(isset($_GET['id']))
{
	foreach($dal->Find($_GET['id']) as $row)
	{
		//if($row['id']==$_GET['id'])
		//{
			$objBAL->id=$row['id'];
			$objBAL->text=$row['text'];
			$objBAL->author=$row['author'];
		//}
	}
}
if(isset($_GET['did']))
{
	$dal->Delete($_GET['did']); 
	echo "<script type='text/javascript'>location.href = 'index.php';</script>";
}
if(isset($_POST['submit']))
{	
	$objBAL->id=$_POST['id'];
	$objBAL->text=$_POST['text'];
	$objBAL->author=$_POST['author'];
	if($objBAL->id==0)
	{
		$dal->Add($objBAL); echo "<script type='text/javascript'>location.href = 'index.php';</script>";
	}
	else
	{
		$dal->Update($objBAL); echo "<script type='text/javascript'>location.href = 'index.php';</script>";
	}
}
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row" style="min-height: 654px;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <h2><?php echo isset($_GET['id'])?"Update":"Add"; ?> Testimonial</h2>
                    <form method="post">
                        <div class="form-horizontal col-sm-6">
                            <div class="form-group hidden">
                                <label class="control-label col-md-2">id</label>
                                <div class="col-md-10">
                                    <input type="text" name="id" class="form-control"
                                        value="<?php echo isset($_GET['id'])?$_GET['id']:0; ?>" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Text</label>
                                <div class="col-md-10">
                                    <input type="text" name="text" value="<?php echo $objBAL->text;?>"
                                        class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Author</label>
                                <div class="col-md-10">
                                    <input type="text" name="author" value="<?php echo $objBAL->author;?>"
                                        class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <input type="submit" name="submit" value="Save" class="btn btn-default" />
                                </div>
                            </div>
                        </div>
                    </form>
                    <a href="../testimonials">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>