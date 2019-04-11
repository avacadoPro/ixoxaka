<?php  

	require '../lib/db.php';
	$db = new Database();

	if($_REQUEST['action'] == "add_course"){

		$code       = $_POST['code'];
        $name       = $_POST['name'];
        $start      = $_POST['start'];
        $end        = $_POST['end'];

        $sql = "INSERT INTO courses (code, name, course_start, course_end) VALUES ('$code', '$name', '$start', '$end')";

        $result = $db->query($sql);

        echo "<script> location.href='../course'; </script>";
	}


	if($_REQUEST['action'] == "delete_course"){

		$id  = $_REQUEST['id'];

        $sql = "DELETE FROM courses WHERE id='$id'";

        $result = $db->query($sql);

        echo "<script> location.href='../course'; </script>";
	}


	if($_REQUEST['action'] == "update_course"){

		$code       = $_POST['code'];
        $name       = $_POST['name'];
        $start      = $_POST['start'];
        $end        = $_POST['end'];

        $sql = "INSERT INTO courses (code, name, course_start, course_end) VALUES ('$code', '$name', '$start', '$end')";

        $result = $db->query($sql);

        echo "<script> location.href='../course'; </script>";
	}


	if($_REQUEST['action'] == "select_course"){

		$code       = $_POST['code'];
        $name       = $_POST['name'];
        $start      = $_POST['start'];
        $end        = $_POST['end'];

        $sql = "INSERT INTO courses (code, name, course_start, course_end) VALUES ('$code', '$name', '$start', '$end')";

        $result = $db->query($sql);

        echo "<script> location.href='../course'; </script>";
	}



?>