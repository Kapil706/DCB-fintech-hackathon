
<?php
$db = mysqli_connect("localhost", "root", "", "dcb");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}else{
if(isset($_POST['ex6'])){
	$flag='0';
$ex=$_POST['ex6'];
$ex1=$_POST['ex7'];
$ex2=$_POST['ex8'];
$ex3=$_POST['ex9'];
$ex5=$_POST['sel'];
$sql = "SELECT * FROM soil_nutrients WHERE nutri='potassium' ";
		$result = mysqli_query($db, $sql);
		if (mysqli_num_rows($result) ==1){
			$r=mysqli_fetch_array($result, MYSQLI_ASSOC);
			if($ex>$r['opt']){
				
			}else{
				$flag='10';
			}
			
		}
		$sql1 = "SELECT * FROM soil_nutrients WHERE nutri='phosphorus' ";
		$result1 = mysqli_query($db, $sql1);
		if (mysqli_num_rows($result1) ==1){
			$r1=mysqli_fetch_array($result1, MYSQLI_ASSOC);
			if($ex1>$r1['opt']){
				
			}else{
				$flag='11';
			}
			
		}
		$sql2 = "SELECT * FROM soil_nutrients WHERE nutri='calcium' ";
		$result2 = mysqli_query($db, $sql2);
		if (mysqli_num_rows($result2) ==1){
			$r2=mysqli_fetch_array($result2, MYSQLI_ASSOC);
			if($ex2>$r2['opt']){
				
			}else{
				$flag='12';
			}
			
		}
		$sql3 = "SELECT * FROM soil_nutrients WHERE nutri='magnisium' ";
		$result3 = mysqli_query($db, $sql3);
		if (mysqli_num_rows($result3) ==1){
			$r3=mysqli_fetch_array($result3, MYSQLI_ASSOC);
			if($ex3>$r3['opt']){
				
			}else{
				$flag='21';
			}
			
		}
		if($flag=='0'){
			header("Location:map2.php?id=1 & crop=$ex5");
			
		}else{header("Location:map.html?id=0 & crop=$ex5");}
	
	
}else{echo"adsfa";}
}


?>