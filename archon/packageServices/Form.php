<?php
$classname="packageServicesDAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.php';
});
$classname="packageServicesBAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.php';
});
$db=new packageServicesDAL(null);
include '../Header1.php';
$objBAL=new packageServicesBAL();
if(isset($_GET['id']))
{
	foreach($db->Find($_GET['id']) as $row)
	{
		//if($row['id']==$_GET['id'])
		//{
			$objBAL->id=$row['id'];
			$objBAL->title=$row['title'];
		//}
		//else{
		//}
	}
}
if(isset($_GET['did']))
{
	$db->Delete($_GET['did']);
		echo "<script type='text/javascript'>location.href = 'index.php';</script>";
}
if(isset($_POST['submit']))
{	
	$objBAL->id=$_POST['id'];
	$objBAL->title=$_POST['title'];
	if($objBAL->id==0)
	{
		$db->Add($objBAL);
		echo "<script type='text/javascript'>location.href = 'index.php';</script>";
	}
	else
	{
		$db->Update($objBAL);
		echo "<script type='text/javascript'>location.href = 'index.php';</script>";
	}
}
?>
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 

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
					<h2><?php echo isset($_GET['id'])?"Update ":"Add "; ?> Packege Service</h2>
					<div class="x_content">
						<form method="post"  enctype="multipart/form-data">
							<div class="form-horizontal col-sm-6">
								<div class="form-group hidden">
										<label class = "control-label col-md-2">id</label>
										<div class="col-md-10">
											<input type="text" name="id" class = "form-control" 
											value="<?php echo isset($_GET['id'])?$_GET['id']:0; ?>" required/>
										</div>
								</div>
								<div class="form-group">
									<label class = "control-label col-md-2">Title</label>
									<div class="col-md-10">
										<input type="text" name="title" value="<?php echo $objBAL->title;?>" class = "form-control" required/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-2 col-md-10"> <br><hr>
										<input type="submit" name="submit" value="Save" class = "btn btn-default btn-block"/>
									</div>
								</div>
								<div class="form-group">
								<a href="../packageServices">Back to List</a>
								</div>
							</div>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
