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
$result=null;
if(isset($_POST['btn_search']))
{
	$objBAL=new contactus_userDAL();
	$objBAL->id=$_POST['txt_Search'];
	$objBAL->userName=$_POST['txt_Search'];
	$objBAL->email=$_POST['txt_Search'];
	$objBAL->website=$_POST['txt_Search'];
	$objBAL->message=$_POST['txt_Search'];
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

                     <h4>Contact Us User</h4>
                     <hr>
                     <!-- <a href="Form.php" class="btn btn-primary">Add new contactus user</a> -->
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
                                     User Name
                                 </th>
                                 <th>
                                     Email
                                 </th>
                                 <th>
                                     Website
                                 </th>
                                 <th>
                                     Message
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
                                       echo '<td>'.$row['userName']."</td>";
                                       echo '<td>'.$row['email']."</td>";
                                       echo '<td>'.$row['website']."</td>";
                                       echo '<td>'.$row['message']."</td>";
                                       echo '<td> <a href="View.php?id='.$row['id'].'">View</a> | <a href="Form.php?did='.$row['id'].'">Delete</a></td>';
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
include '../footer.php';
?>
