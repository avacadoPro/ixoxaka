<?php
$classname = "clients1DAL.php";
spl_autoload_register(function ($class_name) {
	include 'classes/' . $class_name . '.php';
});
$classname = "clients1BAL.php";
spl_autoload_register(function ($class_name) {
	include 'classes/' . $class_name . '.php';
});
$dal = new clients1DAL();
include '../header1.php';
$result = null;
if (isset($_POST['btn_search'])) {
	$objBAL = new clients1DAL();
	$objBAL->id = $_POST['txt_Search'];
	$objBAL->image = $_POST['txt_Search'];
	$result = $dal->Search($objBAL);
} else {
	$result = $dal->LoadAll();
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

                     <h4>Clients</h4>
                     <hr>

                     <div class="x_content">
					 <a href="Form.php" class="btn btn-primary">Add new Client</a>
						<hr>
						<div class="row">
						<?php
							foreach ($result as $row) {
								echo '<div class="col-sm-4" style="margin-bottom: 10px;"><div class="card"> <img class="card-img-top" src="../' . $row['image'] . '" style="height:200px;width:auto"/> <div class="card-body"><a href="Form.php?id='.$row['id'].'">Edit</a> | <a href="Form.php?did='.$row['id'].'">Delete</a> </div></div></div>';

							}
						?>
						
						</div>                    
                        </div>
                    </div>
                </div>                
            </div>
<?php	
include '../footer.php';
?>
