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
$result=null;
if(isset($_POST['btn_search']))
{
	$objBAL=new packagesDAL();
	$objBAL->id=$_POST['txt_Search'];
	$objBAL->title=$_POST['txt_Search'];
	$objBAL->price=$_POST['txt_Search'];
	$objBAL->type=$_POST['txt_Search'];
	$objBAL->personalLocker=$_POST['txt_Search'];
	$objBAL->freeAccess=$_POST['txt_Search'];
	$objBAL->personalTrainer=$_POST['txt_Search'];
	$objBAL->NutritionPlan=$_POST['txt_Search'];
	$objBAL->FreeMassage=$_POST['txt_Search'];
	$result=$dal->Search($objBAL);
}
else
{
	$result=$dal->LoadAll();
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

                    <h4>Packages</h4>
                    <hr>
                    <a href="Form.php" class="btn btn-primary">Add new package</a>
                    <form method="post">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-10">
                                <input type="text" name="txt_Search" placeholder="Search" class="form-control" />
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" name="btn_search" value="Search" class="btn btn-primary"
                                    style="margin-left:-70px" />
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
                                    Price
                                </th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    PersonalLocker
                                </th>
                                <th>
                                    FreeAccess
                                </th>
                                <th>
                                    Personal Trainer
                                </th>
                                <th>
                                    NutritionPlan
                                </th>
                                <th>
                                    FreeMassage
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
                                            echo '<td>'.$row['price']."</td>";
                                            echo '<td>'.$row['type']."</td>";
                                            $personalLockerTemp=($row['personalLocker']==true)?"Yes":"No";
                                            echo '<td>'. $personalLockerTemp."</td>";
                                            $freeAccessTemp=($row['freeAccess']==true)?"Yes":"No";		
                                            echo '<td>'. $freeAccessTemp."</td>";
                                            $personalTrainerTemp=($row['personalTrainer']==true)?"Yes":"No";			
                                            echo '<td>'. $personalTrainerTemp."</td>";
                                            $NutritionPlanTemp=($row['NutritionPlan']==true)?"Yes":"No";			
                                            echo '<td>'. $NutritionPlanTemp."</td>";
                                            $FreeMassageTemp=($row['FreeMassage']==true)?"Yes":"No";			
                                            echo '<td>'. $FreeMassageTemp."</td>";
                                            echo '<td> <a href="Form.php?id='.$row['id'].'">Edit</a> | <a href="Form.php?did='.$row['id'].'">Delete</a></td>';
                                        echo '</tr>';		
                                    }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php	
include '../Footer1.php';
?>
