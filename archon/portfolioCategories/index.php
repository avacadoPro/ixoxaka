<?php
$classname="portfolioCategoriesDAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.php';
});
$classname="portfolioCategoriesBAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.php';
});
$db=new portfolioCategoriesDAL(null);
include '../Header1.php';
$result=null;
if(isset($_POST['btn_search']))
{
	$objBAL=new portfolioCategoriesDAL();
	$objBAL->id=$_POST['txt_Search'];
	$objBAL->title=$_POST['txt_Search'];
	$result=$db->Search($objBAL);
}
else
{
	$result=$db->LoadAll();
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

					<h4>Portfolios</h4>
					<hr>
				
					<div class="x_content">
						<a href="Form.php" class="btn btn-primary">Add new Portfolio Category</a>
						<form method="post">
							<div class="col-sm-6">
							</div>
							<div class="col-sm-6">
								<div class="col-sm-10" >
									<input type="text" name="txt_Search" placeholder="Search" class = "form-control"/>	
								</div>
								<div class="col-sm-2"  >
									<input type="submit" name="btn_search" value="Search" class = "btn btn-primary" style="margin-left:-70px"/>
								</div>		
							</div>
						</form>
						<table class="table">
						<thead>
							<tr>
								<th class="hidden">
								id
								</th>
								<th>
								Title
								</th>
								<th>
								</th>
							</tr>
							</thead>
							<tbody>
						<?php
							foreach($result as $row)
								{
									echo '<tr >';
									echo '<td class="hidden">'.$row['id']."</td>";
									echo '<td>'.$row['title']."</td>";
									echo '<td> <a href="Form.php?id='.$row['id'].'">Edit</a> | <a href="Form.php?did='.$row['id'].'">Delete</a></td>';
									echo '</tr>';		
								}
						?>
						</tbody>
						</table>
						</table>
					</div>
				</div>
			</div>
			
		</div>
<?php	
include '../footer.php';
?>
