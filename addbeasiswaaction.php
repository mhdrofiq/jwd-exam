<!-- written by Muhammad Rofiqurrahman Ibnu Disya Ghazali, August 2023 -->

<?php
require_once("includes/dbconnect.php");

if (isset($_POST['save'])) {
	// Escape special characters in a string for use in an SQL statement
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$semester = mysqli_real_escape_string($conn, $_POST['semester']);	
	$type = mysqli_real_escape_string($conn, $_POST['type']);	
	$gpa = $_POST['gpa'];
    $status = "Belum Diverifikasi";	

	if(isset($_FILES['file']['name'])){
		// Get file info
		$fileName = $_FILES["file"]["name"];
		$tempName = $_FILES["file"]["tmp_name"];
		$fileType = pathinfo($fileName, PATHINFO_EXTENSION);
		$path = 'uploads/'.$fileName;

		// Allow certain file formats
		$allowTypes = array('jpg','png','jpeg','pdf','zip', 'rar');
		if(in_array($fileType, $allowTypes)){
			move_uploaded_file($tempName, $path);

			// Update the database table
			$sql = "INSERT INTO beasiswa (`name`, `email`, `phone`, `semester`, `gpa`, `type`, `filename`, `status`) VALUES ('$name', '$email', '$phone', '$semester', '$gpa', '$type', '$fileName', '$status' )";
			$result = mysqli_query($conn, $sql);
		}
		else {
			echo "<script>alert('Format file tidak didukung.')</script>";
		}
	} else {
		echo "<script>alert('Mohon upload berkas.')</script>";
	}

    // Redirect
    header("Location: hasil.php");
    exit;
}