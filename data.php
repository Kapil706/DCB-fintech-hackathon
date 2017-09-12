<?php
$db = mysqli_connect("localhost", "root", "", "dcb");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}else{

	$ifsc='DCBL0000062 ';
	$pass='12345678 ';
	
	$sql = "INSERT INTO login(	IFSC,PASS) VALUES('$ifsc','$pass')";
			if(mysqli_query($db, $sql)){
				echo "success";
				}else{
				echo "failed" ;
			}
	
	

}
?>