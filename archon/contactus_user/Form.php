<?php
$classname="contactus_userDAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.php';
});
$classname="contactus_userBAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.php';
});
$dal=new contactus_userDAL(null);
include '../Header1.php';
$objBAL=new contactus_userBAL();
if(isset($_GET['id']))
{
	foreach($dal->Find($_GET['id']) as $row)
	{
		//if($row['id']==$_GET['id'])
		//{
			$objBAL->id=$row['id'];
			$objBAL->userName=$row['userName'];
			$objBAL->email=$row['email'];
			$objBAL->website=$row['website'];
			$objBAL->message=$row['message'];
		//}
		//else{
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
	$objBAL->userName=$_POST['userName'];
	$objBAL->email=$_POST['email'];
	$objBAL->website=$_POST['website'];
	$objBAL->message=$_POST['message'];
	if($objBAL->id==0)
	{
		$dal->Add($objBAL);
		echo "<script type='text/javascript'>location.href = 'index.php';</script>";
	}
	else
	{
		$dal->Update($objBAL);
		echo "<script type='text/javascript'>location.href = 'index.php';</script>";
	}
}
?>
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 

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
                    <h2><?php echo isset($_GET['id'])?"Update ":"Add "; ?>contactus_user</h2>
                    <div class="x_content">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-horizontal col-sm-6">
                                <div class="form-group hidden">
                                    <label class="control-label col-md-2">id</label>
                                    <div class="col-md-10">
                                        <input type="text" name="id" class="form-control"
                                            value="<?php echo isset($_GET['id'])?$_GET['id']:0; ?>" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="userName" value="<?php echo $objBAL->userName;?>"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Email</label>
                                    <div class="col-md-10">
                                        <input type="text" name="email" value="<?php echo $objBAL->email;?>"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Website</label>
                                    <div class="col-md-10">
                                        <input type="text" name="website" value="<?php echo $objBAL->website;?>"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Message</label>
                                    <div class="col-md-10">
                                        <input type="text" name="message" value="<?php echo $objBAL->message;?>"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10"> <br>
                                        <hr>
                                        <input type="submit" name="submit" value="Save"
                                            class="btn btn-default btn-block" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="../contactus_user">Back to List</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
