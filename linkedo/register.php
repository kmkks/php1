<?php

	require('connection.php');
	require('ServerAPI.php');

	if (isset($_POST['phonenum']) && isset($_POST['userpwd'])) {
        
		 	$phonenum = htmlspecialchars($_POST['phonenum']);
		 	$userpwd =  htmlspecialchars($_POST['userpwd']);


		 	$sql = "insert into lo_user(phone_num, password) values('".$phonenum."','".$userpwd."')";

		 	$result = $mysqli->query($sql);
        
		 	if ($result) {
                 $id = $mysqli->insert_id;
                
                 $defaultUrl = "http://zhiyequan.sinaapp.com/zhiye/logo.png";
                
                 $server = new ServerAPI('k51hidwq1b2tb','y22Fy12TRh54');
                
                 $rets = $server->getToken($id,$username,$defaultUrl);
              
                 $array = json_decode($rets,true);
              	
                 $tokenSql = "update lo_user set ry_token='".$array['token']."' where id=".$id;
                       	
                 $mysqli->query($tokenSql);
                           
                
		 		$jsonArray = array('cid' => '1001','ret' => '1');
		 		echo json_encode($jsonArray);
                
		 	}  else {
		 	
		 		$jsonArray = array('cid' => '1001','ret' => '0');
		 		echo json_encode($jsonArray);
            }
        $musqli->close();

    } else {
        
		 $jsonArray = array('cid' => '1001','ret' => '2');
		 echo json_encode($jsonArray);
        
    }
	
	

