<?php
header("Access-Control-Allow-Origin: *");
$target_dir = "images/";

if (isset($_POST['path'])) {
    $target_dir .= $_POST['path']."/";
}
$filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
$imageFileType = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
$newFileName=basename($filename).date('YmdHis').".".$imageFileType;
$target_file = $target_dir . $newFileName;
$uploadOk = 1;



$filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
    $isFile = (strlen($_FILES['file']['name']) != 0) ? true : false;
    $imageFileType = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    $newFileName = basename($filename) . date('YmdHis') . "." . $imageFileType;
    if ($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg") {
        $resA = array(
            "message" => "File Format Not Suppoted",
            "status" => false
        );
        echo json_encode($resA);
        return;
    } else {
        if ($isFile) {
            $target_file = $target_dir . $newFileName;
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $resA = array(
                    "message" => "The file " . $newFileName. " has been uploaded.",
                    "filename" => $target_file,
                    "status" => true
                );
                echo json_encode($resA, JSON_PRETTY_PRINT);
                return;
            }else{
                $resA = array(
                    "message" => "Sorry, there was an error uploading your file.",
                    "status" => false
                );
                echo json_encode($resA, JSON_PRETTY_PRINT);
                return;
            }
        }
    }
