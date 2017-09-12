<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "dcb");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}else{
if(isset($_POST['pass'])){
	$ifsc=$_POST['ifsc'];
	$password=$_POST['pass'];
	$sql = "SELECT * FROM login WHERE IFSC='$ifsc' and PASS='$password'";
		$result = mysqli_query($db, $sql);
		if (mysqli_num_rows($result) ==1){
			$r=mysqli_fetch_array($result, MYSQLI_ASSOC);
			$id=$r['id'];
			$_SESSION['id']=$id;
			header("Location:index2.html?id=$id");
		}else{
			echo "<script>alert('qrong username or password');window.location='index.html';</script>";
		}
}
else{
	
	echo'no';
}
}

?>