<?php
$request_method=$_SERVER["REQUEST_METHOD"];
$classname="portfolioCategoriesDAL.php";
spl_autoload_register(function ($class_name) {
    include '../classes/'.$class_name . '.php';
});
$classname="portfolioCategoriesBAL.php";
spl_autoload_register(function ($class_name) {
    include '../classes/'.$class_name . '.php';
});
$db=new portfolioCategoriesDAL(include("../../../dbConfig.php"));
switch ($request_method) {
        case 'GET':
            // Retrive Products
            if (!empty($_GET["id"])) {
                try {
                    $id=intval($_GET["id"]);
                    header('Content-Type: application/json');
					$results = $db->Find($id)->fetchAll(PDO::FETCH_ASSOC);
					if(isset($results[0])){
						$json = json_encode($results[0]);
						echo $json;
					}else{
						echo "{}";
					}
                    
                    
                } catch (Exception $e) {
                    http_response_code(500);
                    $json = json_encode($e);
                    echo $json;
                }
            } else {
                try {
                    header('Content-Type: application/json');
                    $results = $db->LoadAll()->fetchAll(PDO::FETCH_ASSOC);
                    $json = json_encode($results);
                    echo $json;
                } catch (Exception $e) {
                    http_response_code(500);
                    $json = json_encode($e);
                    echo $json;
                }
            }
            break;
        case 'POST':
			try {
				$data = json_decode(file_get_contents('php://input'), true);
				$portfolioCategory=new portfolioCategoriesBAL();
				$portfolioCategory->title=$data["title"];
				header('Content-Type: application/json');
				$db->Add($portfolioCategory);
				$results=$db->LoadMaxObj()->fetchAll(PDO::FETCH_ASSOC);
				$json = json_encode($results[0]);
				echo $json;
			} catch (Exception $e) {
				http_response_code(500);
				$json = json_encode($e);
				echo $json;
			}
        break;

        case 'PUT':
			try {
				$data = json_decode(file_get_contents('php://input'), true);
				$id=intval($_GET["id"]);
				$portfolioCategory=new portfolioCategoriesBAL();
				$portfolioCategory->id=$data["id"];
				$portfolioCategory->title=$data["title"];
				header('Content-Type: application/json');
				$db->Update($portfolioCategory);
				$json = json_encode($data);
				echo $json;
			} catch (Exception $e) {
				http_response_code(500);
				$json = json_encode($e);
				echo $json;
			}
        break;
        case 'DELETE':
            try {
				
				if(isset($_GET["id"])){
					$id=intval($_GET["id"]);
					if($db->Delete($id)){
						header('Content-Type: application/json');
						echo '{"status":"Executed"}';
					}else{
						header('Content-Type: application/json');
						echo '{"status":"Executed"}';
					}
					
				}else{					
					header('Content-Type: application/json');
					http_response_code(500);
					echo '{"errorInfo": ["Id not Detected"]}';
				}
				
            } catch (Exception $e) {
                http_response_code(500);
                $json = json_encode($e);
                echo $json;
            }
        break;
        default:
            // Invalid Request Method
            header("HTTP/1.0 405 Method Not Allowed");
            break;
    }
