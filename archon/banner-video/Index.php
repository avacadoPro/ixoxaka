<?php
$classname = "bannerDAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});
$classname = "bannerBAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});
$dal = new bannerDAL();
include '../header1.php';
$objBAL = new bannerBAL();
// if (isset($_GET['id'])) {
foreach ($dal->Find(1) as $row) {
		//if($row['id']==$_GET['id'])
		//{
    $objBAL->id = $row['id'];
    $objBAL->videoURL = $row['videoURL'];
		//}
    // }
}
if (isset($_GET['did'])) {
    $dal->Delete($_GET['did']);
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
}
if (isset($_POST['submit'])) {



    $filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
    $isFile = (strlen($_FILES['file']['name']) != 0) ? true : false;
    $target_dir = "../images/banner_videos/";
    $imageFileType = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    $newFileName = basename($filename) . date('YmdHis') . "." . $imageFileType;
    if ($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg") {
        echo "File Format Not Suppoted";
    } else {
        if ($isFile) {
            $target_file = $target_dir . $newFileName;
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $objBAL->id = 1;
                $objBAL->videoURL = "images/banner_videos/" . $newFileName;
                print_r($objBAL->videoURL);
                if ($objBAL->id == 0) {
                    $dal->Add($objBAL);
                    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
                } else {
                    $dal->Update($objBAL);
                    echo "<script type='text/javascript'>location.href = 'index.php';</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Error while uploading video');</script>";
            }
        }
        

    }
}
?>

<script  type="text/javascript">
 $(document).on("change", "#file", function(evt) {
  var $source = $('#video_here');
  $source[0].src = URL.createObjectURL(this.files[0]);
  $source.parent()[0].load();
});
//   function readURL(input) {
//         if (input.files && input.files[0]) {
//             var reader = new FileReader();

//             reader.onload = function (e) {
//                 $('#file')
//                     .attr('src', e.target.result)
//                     .width(150)
//                     .height(150);
//             };

//             reader.readAsDataURL(input.files[0]);
//         }
//     }





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

                    <h2>Banner Video</h2>
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
                            <video width="550" height="350" controls id="video_here">
                                <source src="../<?php echo $objBAL->videoURL ?>" type="video/mp4">
                            </video> 
                            <input style="margin-left:30%" type="file" name="file" accept="video/*" id="file">
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    
                                <input type="submit" name="submit" value="Save" class = "btn btn-default btn-block"/>
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
