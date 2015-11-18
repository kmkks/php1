<?php

	require('connection.php');

	if(isset($_POST['target_id']) && isset($_POST['type'])) {
     	$target_id = htmlspecialchars($_POST['target_id']);
    	$type = htmlspecialchars($_POST['type']);
        $sql = "";
        if ($type) {
            $sql = "update lo_transmit set is_delete = 1 where id =".$target_id;
        } else {
            $sql = "update lo_share set is_delete = 1 where id =".$share_id;
        }
 		
        $result = $mysqli->query($sql);
        
		if ($result) {
            $jsonArray = array('cid' => '1007','ret' => '1');
		 	echo json_encode($jsonArray);   
        } else {
            $jsonArray = array('cid' => '1007','ret' => '0');
		    echo json_encode($jsonArray);  
         }
        $musqli->close();
   	 } else {
        $jsonArray = array('cid' => '1007','ret' => '2');
		 echo json_encode($jsonArray); 
    }