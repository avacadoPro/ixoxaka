<?php
$classname = "funfactsDAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});
$classname = "funfactsBAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});
$dal = new funfactsDAL();
include '../Header1.php';
$objBAL = new funfactsBAL();
// if (isset($_GET['id'])) {
foreach ($dal->Find(1) as $row) {
		//if($row['id']==$_GET['id'])
		//{
    $objBAL->id = $row['id'];
    $objBAL->creativeWork=$row['creativeWork'];
    $objBAL->satisfiedClients=$row['satisfiedClients'];
    $objBAL->cupsofcoffee=$row['cupsofcoffee'];
		//}
    // }
}
if (isset($_GET['did'])) {
    $dal->Delete($_GET['did']);
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
}
if (isset($_POST['submit'])) {


    $objBAL->id = 1;
    $objBAL->creativeWork=$_POST['creativeWork'];
	$objBAL->satisfiedClients=$_POST['satisfiedClients'];
	$objBAL->cupsofcoffee=$_POST['cupsofcoffee'];
    // if ($objBAL->id == 0) {
    //     $dal->Add($objBAL);
    //     echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    // } else {
    $dal->Update($objBAL);
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    // }

}
?>

<script  type="text/javascript">
 
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }



</script>
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

                    <h2>Fun Facts</h2>
                    <div class="x_content">

                        <form method="post" enctype="multipart/form-data">
							
                        <div class="form-horizontal col-sm-6">
                            <div class="form-group hidden">
                                    <label class = "control-label col-md-2">id</label>
                                    <div class="col-md-10">
                                    <input type="text" name="id" class = "form-control" 
                                        value="<?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>" required/>
                                    </div>
                            </div>                           
                            <div class="form-group">
                                <label class = "control-label col-md-2">Creative Work</label>
                                <div class="col-md-10">
                                <input type="number"  min="0" max="111111111" step="1" name="creativeWork" class = "form-control" value="<?php echo $objBAL->creativeWork;?>" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class = "control-label col-md-2">Satisfied Clients</label>
                                <div class="col-md-10">
                                <input type="number"  min="0" max="111111111" step="1" name="satisfiedClients" class = "form-control" value="<?php echo $objBAL->satisfiedClients;?>" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class = "control-label col-md-2">Cups of Coffee</label>
                                <div class="col-md-10">
                                <input type="number"  min="0" max="111111111" step="1" name="cupsofcoffee" class = "form-control" value="<?php echo $objBAL->cupsofcoffee;?>" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                <input type="submit" name="submit" value="Save" class = "btn btn-default"/>
                                </div>
                            </div>
                        </div>
							
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
