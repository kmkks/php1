<?php

	require('connection.php');

	if(isset($_POST['user_id']) && isset($_POST['target_id']) && isset($_POST['type']) && isset($_POST['is_add'])) {
        
        $user_id = htmlspecialchars($_POST['user_id']);
        $target_id = htmlspecialchars($_POST['target_id']);
        $type = htmlspecialchars($_POST['type']);
        $is_add = htmlspecialchars($_POST['is_add']);
        if($type == 1) {
            $sql = "";
            if($is_add) {
             	$sql = "insert into lo_praise_share(user_id,share_id) values(".$user_id.",".$target_id.")";   
            } else {
                $sql = "delete from lo_praise_share where user_id=".$user_id." and share_id=".$target_id; 
        
            }
            $result = $mysqli->query($sql);
            if($result) {
                $jsonArray = array('cid' => '1008','ret' => '1','type' => '1');
		 		echo json_encode($jsonArray); 
            } else {
                 $jsonArray = array('cid' => '1008','ret' => '0','type' => '1');
		 		echo json_encode($jsonArray); 
            }
            
        } else {
            $sql = "";
            if($is_add == 0) {
           		 $sql = "insert into lo_praise_transmit(user_id,transmit_id) values(".$user_id.",".$target_id.")";
            } else {
                $sql = "delete from lo_praise_transmit where user_id=".$user_id."and transmit_id=".$target_id; 
            }
            
            $result = $mysqli->query($sql);
            
            if($result) {
                $jsonArray = array('cid' => '1008','ret' => '1','type' => '0');
		 		echo json_encode($jsonArray); 
            } else {
                 $jsonArray = array('cid' => '1008','ret' => '0','type' => '0');
		 		echo json_encode($jsonArray);
            }
 
        }
    	$musqli->close();
    } else {
         $jsonArray = array('cid' => '1008','ret' => '2');
		 echo json_encode($jsonArray); 
    }
        
       