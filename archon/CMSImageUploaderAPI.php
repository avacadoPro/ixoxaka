<?php
header("Access-Control-Allow-Origin: *");
$target_dir = "images/";

if(isset($_POST['path'])){
    $target_dir .= $_POST['path']."/";
}
$filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
$imageFileType = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
$newFileName=basename($filename).date('YmdHis').".".$imageFileType;
$target_file = $target_dir . $newFileName;
$uploadOk = 1;

$check = getimagesize($_FILES["file"]["tmp_name"]);
if ($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
} else {
    $resA = array(
        "message" => "File is not an image.",
        "status" => false
    );
    echo json_encode($resA, JSON_PRETTY_PRINT);
    return;
    $uploadOk = 0;
}

if (file_exists($target_file)) {
    $resA = array(
        "message" => "Sorry, file already exists.",
        "status" => false
    );
    echo json_encode($resA, JSON_PRETTY_PRINT);
    return;
    $uploadOk = 0;
}
// Check file size
/*if ($_FILES["file"]["size"] > 500000) {
    $resA = array(
        "message" => "Sorry, your file is too large.",
        "status" => false
    );
    echo json_encode($resA, JSON_PRETTY_PRINT);
    return;
    $uploadOk = 0;
}*/
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    $resA = array(
        "message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed.",
        "status" => false
    );
    echo json_encode($resA);
    return;
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $resA = array(
        "message" => "Sorry, your file was not uploaded.",
        "status" => false
    );
    echo json_encode($resA, JSON_PRETTY_PRINT);
    return;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $resA = array(
            "message" => "The file " . $newFileName. " has been uploaded.",
            "filename" => $target_file,
            "status" => true
        );
        echo json_encode($resA, JSON_PRETTY_PRINT);
        return;
    } else {
        $resA = array(
            "message" => "Sorry, there was an error uploading your file.",
            "status" => false
        );
        echo json_encode($resA, JSON_PRETTY_PRINT);
        return;
    }
}

?>