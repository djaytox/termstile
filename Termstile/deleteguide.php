<?php
	if(isset($_COOKIE['email'])){
		include 'dbconnect.php';
		$email = $_COOKIE['email'];
		$id = $_POST['id'];
		$delete = "DELETE FROM `Guides` WHERE Id = '$id'";
		mysql_query($delete);
		$getUsers = mysql_query("SELECT * FROM `Users` WHERE Email = '$email'");
		while($info = mysql_fetch_array($getUsers)){
				 $guides = str_replace("|".$id."|", "|", $info['MyGuides']);
				 $update = "UPDATE `Users` SET MyGuides='$guides' WHERE Email='$email'";
				 mysql_query($update);
				 echo $id;
		}	
	}
	
?>