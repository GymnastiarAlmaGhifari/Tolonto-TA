<?php 
session_start();

if (isset($_SESSION['id_admin']) && isset($_SESSION['username'])) 

    include "Database.php";

if (isset($_POST['passwod']) && isset($_POST['password_baru'])
    && isset($_POST['konfirmasi_password_baru'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$password = validate($_POST['password']);
	$password_baru = validate($_POST['password_baru']);
	$konfirmasi_password_baru = validate($_POST['konfirmasi_password_baru']);
    
    if(empty($password)){
      header("Location: modals_ubahpassword.php?error=Old Password is required");
	  exit();
    }else if(empty($password_baru)){
      header("Location: modals_ubahpassword.php?error=New Password is required");
	  exit();
    }else if($password_baru !== $konfirmasi_password_baru){
      header("Location: modals_ubahpassword.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	$password = md5($password);
    	$password_baru = md5($password_baru);
        $id = $_SESSION['id_admin'];

        $sql = "SELECT password
                FROM manage WHERE 
                id_admin='$id' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE manage
        	          SET password='$password_baru'
        	          WHERE id_admin='$id'";
        	mysqli_query($conn, $sql_2);
        	header("Location: modals_ubahpassword.php?success=Your password has been changed successfully");
	        exit();

        }else {
        	header("Location: modals_ubahpassword.php?error=Incorrect password");
	        exit();
        }

    }

    
}else{
	header("Location: profile.php");
	exit();
}