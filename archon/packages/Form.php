<?php
$classname="packagesDAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.php';
});
$classname="packagesBAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.php';
});
$dal=new packagesDAL(null);
include '../Header1.php';
$objBAL=new packagesBAL();
if(isset($_GET['id']))
{
	foreach($dal->Find($_GET['id']) as $row)
	{
		//if($row['id']==$_GET['id'])
		//{
			$objBAL->id=$row['id'];
			$objBAL->title=$row['title'];
			$objBAL->price=$row['price'];
			$objBAL->type=$row['type'];
			$objBAL->personalLocker=$row['personalLocker'];
			$objBAL->freeAccess=$row['freeAccess'];
			$objBAL->personalTrainer=$row['personalTrainer'];
			$objBAL->NutritionPlan=$row['NutritionPlan'];
			$objBAL->FreeMassage=$row['FreeMassage'];
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
	try{
		$objBAL->id=$_POST['id'];
		$objBAL->title=$_POST['title'];
		$objBAL->price=$_POST['price'];
		$objBAL->type=$_POST['type'];
		$objBAL->personalLocker=(isset($_POST['personalLocker']))?$_POST['personalLocker']:0;
		$objBAL->freeAccess=(isset($_POST['freeAccess']))?$_POST['freeAccess']:0;
		$objBAL->personalTrainer=(isset($_POST['personalTrainer']))?$_POST['personalTrainer']:0;
		$objBAL->NutritionPlan=(isset($_POST['NutritionPlan']))?$_POST['NutritionPlan']:0;
		$objBAL->FreeMassage=(isset($_POST['FreeMassage']))?$_POST['FreeMassage']:0;
	}catch(Exception $e){

	}
	
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
                    <h2><?php echo isset($_GET['id'])?"Update ":"Add "; ?>packages</h2>
                    <div class="x_content">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-horizontal col-sm-6">
                                <div class="form-group hidden">
                                    <label class="control-label col-md-4">id</label>
                                    <div class="col-md-8">
                                        <input type="text" name="id" class="form-control"
                                            value="<?php echo isset($_GET['id'])?$_GET['id']:0; ?>" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Title</label>
                                    <div class="col-md-8">
                                        <input type="text" name="title" value="<?php echo $objBAL->title;?>"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Price</label>
                                    <div class="col-md-8">
                                        <input type="number" min="0" max="111111111" step="1" name="price"
                                            class="form-control" value="<?php echo $objBAL->price;?>" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Type</label>
                                    <div class="col-md-8">
										<select name="type" id="type" class="form-control" required value="<?php echo $objBAL->type;?>">
                                            <option value="Monthly">Monthly</option>
                                            <option value="Yearly">Yearly</option>
									    </select>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Personal Locker</label>
                                    <div class="col-md-8" >
                                        <input type="checkbox" name="personalLocker" value="1"
                                            <?php echo $objBAL->personalLocker==1?"checked":""; ?> />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Free Access</label>
                                    <div class="col-md-8">
                                        <input type="checkbox" name="freeAccess" value="1"
                                            <?php echo $objBAL->freeAccess==1?"checked":""; ?> />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Personal Trainer</label>
                                    <div class="col-md-8">
                                        <input type="checkbox" name="personalTrainer" value="1"
                                            <?php echo $objBAL->personalTrainer==1?"checked":""; ?> />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Nutrition Plan</label>
                                    <div class="col-md-8">
                                        <input type="checkbox" name="NutritionPlan" value="1"
                                            <?php echo $objBAL->NutritionPlan==1?"checked":""; ?> />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Free Massage</label>
                                    <div class="col-md-8">
                                        <input type="checkbox" name="FreeMassage" value="1"
                                            <?php echo $objBAL->FreeMassage==1?"checked":""; ?> />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-8"> <br>
                                        <hr>
                                        <input type="submit" name="submit" value="Save"
                                            class="btn btn-default btn-block" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="../packages">Back to List</a>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>