<?php
	require('connection.php');

	if(isset($_POST['user_id']) && isset($_POST['share_id']) && isset($_POST['content'])) {
    	$user_id = htmlspecialchars($_POST['user_id']);
        $share_id = htmlspecialchars($_POST['share_id']);
        $is_add = htmlspecialchars($_POST['is_add']);
        $content = htmlspecialchars($_POST['content']);
        
        $sql = "insert into lo_transmit(user_id,share_id,content) values(".$user_id.",".$share_id.",'".$content."')";
        $result = $mysqli->query($sql);
		if ($result) {
            $jsonArray = array('cid' => '1006','ret' => '1');
		 	echo json_encode($jsonArray);   
        } else {
            $jsonArray = array('cid' => '1006','ret' => '0');
		    echo json_encode($jsonArray);  
        }
       $musqli->close();
    } else {
         $jsonArray = array('cid' => '1006','ret' => '2');
		 echo json_encode($jsonArray); 
    }