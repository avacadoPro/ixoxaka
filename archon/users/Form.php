<?php
$classname="usersDAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.php';
});
$classname="usersBAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.php';
});
$userDb=new usersDAL(null);
include '../Header1.php';
$objBAL=new usersBAL();
if(isset($_GET['id']))
{
	foreach($userDb->Find($_GET['id']) as $row)
	{
		//if($row['id']==$_GET['id'])
		//{
			$objBAL->id=$row['id'];
			$objBAL->name=$row['name'];
			$objBAL->email=$row['email'];
			$objBAL->password=$row['password'];
			$objBAL->role=$row['role'];
			$objBAL->status=$row['status'];
		//}
		//else{
		//}
	}
}
if(isset($_GET['did']))
{
	$userDb->Delete($_GET['did']);
		echo "<script type='text/javascript'>location.href = 'index.php';</script>";
}
if(isset($_POST['submit']))
{	
	$objBAL->id=$_POST['id'];
	$objBAL->name=$_POST['name'];
	$objBAL->email=$_POST['email'];
	$objBAL->password=$_POST['password'];
	$objBAL->role=$_POST['role'];
	$objBAL->status=(isset($_POST['status'])?$_POST['status']:0);
	if($objBAL->id==0)
	{
		$userDb->Add($objBAL);
		echo "<script type='text/javascript'>location.href = 'index.php';</script>";
	}
	else
	{
		$userDb->Update($objBAL);
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
                    <h2><?php echo isset($_GET['id'])?"Update ":"Add "; ?> User</h2>
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
                                    <input type="text" name="name" value="<?php echo $objBAL->name;?>"
                                        class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Email</label>
                                <div class="col-md-10">
                                    <input type="email" name="email" value="<?php echo $objBAL->email;?>"
                                        class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Password</label>
                                <div class="col-md-10">
                                    <input type="password" name="password" value="<?php echo $objBAL->password;?>"
                                        class="form-control" required />
                                </div>
							</div>
							
                            <div class="form-group hidden">
                                <label class="control-label col-md-2">role</label>
                                <div class="col-md-10">
                                    <input type="text" name="role" value="Admin"
                                        class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">status</label>
                                <div class="col-md-10">
                                    <input type="checkbox" name="status" value="1"
                                        <?php echo $objBAL->status==1?"checked":""; ?> />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10"> <br>
                                    <hr>
                                    <input type="submit" name="submit" value="Save" class="btn btn-default btn-block" />
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="../users">Back to List</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

