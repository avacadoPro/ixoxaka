<?php
$classname="selectedProtfolioCategoriesDAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.php';
});
$classname="selectedProtfolioCategoriesBAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.php';
});
$db=new selectedProtfolioCategoriesDAL(null);
include '..//Header_Footer/Header.php';
$result=null;
if(isset($_POST['btn_search']))
{
	$objBAL=new selectedProtfolioCategoriesDAL();
	$objBAL->id=$_POST['txt_Search'];
	$objBAL->portfolioId=$_POST['txt_Search'];
	$objBAL->portfolioCategoryId=$_POST['txt_Search'];
	$result=$db->Search($objBAL);
}
else
{
	$result=$db->LoadAll();
}

?>
</br>
</br>
<a href="Form.php" class="btn btn-primary">Add new selectedProtfolioCategories</a>
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
           portfolioId
        </th>
        <th>
           portfolioCategoryId
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
			echo '<td>'.$row['portfolioId']."</td>";
			echo '<td>'.$row['portfolioCategoryId']."</td>";
			echo '<td> <a href="Form.php?id='.$row['id'].'">Edit</a> | <a href="Form.php?did='.$row['id'].'">Delete</a></td>';
			echo '</tr>';		
		}
?>
</tbody>
</table>
<?php	
include '../Header_Footer/Footer.php';
?>
