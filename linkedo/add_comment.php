<?php
	require('connection.php');

	if(isset($_POST['user_id']) && isset($_POST['target_id']) && isset($_POST['type']) && isset($_POST['content'])) {
        $user_id = htmlspecialchars($_POST['user_id']);
        $target_id = htmlspecialchars($_POST['target_id']);
        $type = htmlspecialchars($_POST['type']);
        $content = htmlspecialchars($_POST['content']);
        
         if($type == 1) {
            
            $sql = "insert into lo_comment_share(user_id,share_id,content) values(".$user_id.",".$target_id.",'".$content."')";
  
            $result = $mysqli->query($sql);
            if($result) {
                $jsonArray = array('cid' => '1009','ret' => '1','type' => '1');
		 		echo json_encode($jsonArray); 
            } else {
                 $jsonArray = array('cid' => '1009','ret' => '0','type' => '1');
		 		echo json_encode($jsonArray); 
            }
            
        } else {
           
           	$sql = "insert into lo_comment_transmit(user_id,transmit_id,content) values(".$user_id.",".$target_id.",'".$content."')";
  
            $result = $mysqli->query($sql);
            
            if($result) {
                $jsonArray = array('cid' => '1009','ret' => '1','type' => '0');
		 		echo json_encode($jsonArray); 
            } else {
                 $jsonArray = array('cid' => '1009','ret' => '0','type' => '0');
		 		echo json_encode($jsonArray);
            }
 
        }
    	$musqli->close();
    } else {
         $jsonArray = array('cid' => '1008','ret' => '2');
		 	echo json_encode($jsonArray); 
    }
    