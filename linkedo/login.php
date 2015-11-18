<?php
	
	
	require('connection.php');
	
	if (isset($_POST['phonenum']) && isset($_POST['userpwd'])) {
        
		 $phonenum = htmlspecialchars($_POST['phonenum']);
		 $userpwd =  htmlspecialchars($_POST['userpwd']);

		 $sql = "select * from lo_user where phone_num = "
		 		.$phonenum." and password = '".$userpwd."'";
	
		 

		 $result = $mysqli->query($sql);

		if ($result && $result->num_rows == 1 ) {
			 if ($row= $result->fetch_assoc()) {
		  
		  	$arr = array("userid" => $row['id'],"nickname" => $row['nick_name'],"rytoken" => $row['ry_token'],"portraitURL" => $row['portraitURL']
                         ,"gender" => $row['gender'],"achievement" => $row['achievement'], "numofmyattention" => $row['myattention_num']
                         ,"numofattentionme" => $row['attentionme_num']);

		  	$jsonArray = array("cid" => "1002","ret" => "1","responseData" => $arr);

		  	echo json_encode($jsonArray);
		  	}
		} 
		else {
		    $arr = array("cid" => "1002",'ret' => '0');

		  	echo json_encode($arr);
		 }
		  	
		 $mysqli->close();
		  

	} else {
		$arr = array("cid" => "1002",'ret' => '2');
		echo json_encode($arr);
	}

