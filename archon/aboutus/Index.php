<?php
$classname = "aboutusDAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});
$classname = "aboutusBAL.php";
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});
$dal = new aboutusDAL();
include '../header1.php';
$objBAL = new aboutusBAL();
// if (isset($_GET['id'])) {
    foreach ($dal->Find(1) as $row) {
		//if($row['id']==$_GET['id'])
		//{
        $objBAL->id = $row['id'];
        $objBAL->title = $row['title'];
        $objBAL->content = $row['content'];
        $objBAL->image = $row['image'];
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
    $target_dir = "../images/aboutus_images/";
    $imageFileType = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    $newFileName = basename($filename) . date('YmdHis') . "." . $imageFileType;
    if ($isFile) {
        $target_file = $target_dir . $newFileName;
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

        } else {
            echo "<script type='text/javascript'>alert('Error while uploading image');</script>";
        }
    }
    $objBAL->id = 1;
    $objBAL->title = $_POST['title'];
    $objBAL->content = $_POST['content'];
    $objBAL->image = ($isFile) ? "images/aboutus_images/" . $newFileName : $_POST['image'];
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
    // tinyMCE.init({
	// 			mode: 'textareas',
	// 			theme: 'advanced',
	// 			skin: 'o2k7',
				
	// 			plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,tiny_mce_wiris",

	// 			// Theme options
	// 			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
	// 			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	// 			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,tiny_mce_wiris_formulaEditor,tiny_mce_wiris_CAS,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
	// 			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
	// 			theme_advanced_toolbar_location : "top",
	// 			theme_advanced_toolbar_align : "left",
	// 			theme_advanced_statusbar_location : "bottom",
	// 			theme_advanced_resizing : true,

	// 			// Drop lists for link/image/media/template dialogs
	// 			template_external_list_url : "lists/template_list.js",
	// 			external_link_list_url : "lists/link_list.js",
	// 			external_image_list_url : "lists/image_list.js",
	// 			media_external_list_url : "lists/media_list.js",

	// 			// Replace values for the template plugin
	// 			template_replace_values : {
	// 				username : "Some User",
	// 				staffid : "991234"
	// 			}
	// 		});


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

                    <h2>About Us</h2>
                    <div class="x_content">

                        <form method="post" enctype="multipart/form-data">
							
                            <div class="form-horizontal col-sm-9">
                                <div class="form-group hidden">
                                    <label class="control-label col-md-2">id</label>
                                    <div class="col-md-10">
                                        <input type="text" name="id" class="form-control"
                                            value="<?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Title</label>
                                    <div class="col-md-10">
                                        <input type="text" name="title" value="<?php echo $objBAL->title; ?>"
                                            class="form-control" required />
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label class = "control-label col-md-2">Content</label>
                                    <div class="col-md-10">
                                    <textarea id="example" name="content"  style="width:300px" class="ckeditor" ><?php
                                        if (isset($objBAL->content)) {
                                            echo htmlentities($objBAL->content, ENT_QUOTES, 'UTF-8');
                                            // echo $objBAL->content;
                                        }
                                    ?></textarea>
                                        <!-- <textarea name="content" id="contentt"  cols="30" rows="10" required class = "form-control"><?php echo $objBAL->content; ?></textarea> -->
                                    </div>
                                </div>
                               
                                <div class="form-group hidden">
                                    <label class = "control-label col-md-2">dateofcreation</label>
                                    <div class="col-md-10">
                                    <input type="date" name="dateofcreation" id="dateofcreation" value="<?php echo date('Y-m-d'); ?>"class = "form-control"/>
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
                                        <input type="submit" name="submit" value="Save" class="btn btn-default" onclick="nicEditors.findEditor('content').saveContent();" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group text-center">
                                    <img style="height:auto; width: 100%;" src="<?php echo ($objBAL->image) ? '../' . $objBAL->image : 'https://image.freepik.com/free-vector/colorful-feathers_23-2147515001.jpg'; ?>" alt="" id="image"> <br> <br>
                                    <input style="margin-left:30%" type="file" name="file" accept="image/*" onchange="readURL(this)">
                                    
                                </div>
							</div>
							
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
