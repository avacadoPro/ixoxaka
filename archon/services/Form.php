<?php
$classname = "servicesDAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});
$classname = "servicesBAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});
$dal = new servicesDAL();
include '../header1.php';
$objBAL = new servicesBAL();
if (isset($_GET['id'])) {
    foreach ($dal->Find($_GET['id']) as $row) {
		//if($row['id']==$_GET['id'])
		//{
        $objBAL->id = $row['id'];
        $objBAL->name = $row['name'];
        $objBAL->description = $row['description'];
        $objBAL->image = $row['image'];
		//}
    }
}
if (isset($_GET['did'])) {
    $dal->Delete($_GET['did']);
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
}
if (isset($_POST['submit'])) {

    $filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
    $isFile = (strlen($_FILES['file']['name'])!= 0) ? true : false;
    $target_dir = "../images/services_images/";
    $imageFileType = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    $newFileName = basename($filename) . date('YmdHis') . "." . $imageFileType;
    if ($isFile) {
        $target_file = $target_dir . $newFileName;
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

        } else {
            echo "<script type='text/javascript'>alert('Error while uploading image');</script>";
        }
    }
    $objBAL->id = $_POST['id'];
    $objBAL->name = $_POST['name'];
    $objBAL->description = $_POST['description'];
    $objBAL->image = ($isFile)? "images/services_images/" . $newFileName:$_POST['image'];
    if ($objBAL->id == 0) {
        $dal->Add($objBAL);
        echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    } else {
        $dal->Update($objBAL);
        echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    }

}
?>

<script>
  
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

                    <h2><?php echo isset($_GET['id']) ? "Update " : "Add "; ?> Service</h2>
                    <div class="x_content">

                        <form method="post" enctype="multipart/form-data">
							<div class="col-sm-6">
                                <div class="form-group text-center">
                                    <img style="height:150px; width: 150px;" src="../<?php echo ($objBAL->image) ? $objBAL->image : 'images/default.png'; ?>" alt="" id="image"> <br> <br>
                                    <input style="margin-left:30%" type="file" name="file" accept="image/*" onchange="readURL(this)">
                                    
                                </div>
							</div>
                            <div class="form-horizontal col-sm-6">
                                <div class="form-group hidden">
                                    <label class="control-label col-md-2">id</label>
                                    <div class="col-md-10">
                                        <input type="text" name="id" class="form-control"
                                            value="<?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="name" value="<?php echo $objBAL->name; ?>"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Description</label>
                                    <div class="col-md-10">
                                        <input type="text" name="description" value="<?php echo $objBAL->description; ?>"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group hidden">
                                    <label class="control-label col-md-2">image</label>
                                    <div class="col-md-10">
                                        <input type="text" name="image" value="<?php echo $objBAL->image; ?>"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10">
                                        <input type="submit" name="submit" value="Save" class="btn btn-default" />
                                    </div>
                                </div>
							</div>
							
                        </form>
                        <a href="../services">Back to List</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
