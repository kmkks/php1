<?php
	require('connection.php');

	if(isset($_POST['target_id']) && isset($_POST['type'])) {
      
    	$target_id = htmlspecialchars($_POST['target_id']);
        $type = htmlspecialchars($_POST['type']);
 
        if($type == 1) {
             $sql = "delete from lo_comment_share where id=".$target_id; 
            
            $result = $mysqli->query($sql);
            if($result) {
                $jsonArray = array('cid' => '1010','ret' => '1','type' => '1');
		 		echo json_encode($jsonArray); 
            } else {
                 $jsonArray = array('cid' => '1010','ret' => '0','type' => '1');
		 		echo json_encode($jsonArray); 
            }
        } else {
             $sql = "delete from lo_comment_transmit where id=".$target_id; 
             $result = $mysqli->query($sql);
            if($result) {
                $jsonArray = array('cid' => '1010','ret' => '1','type' => '0');
		 		echo json_encode($jsonArray); 
            } else {
                 $jsonArray = array('cid' => '1010','ret' => '0','type' => '0');
		 		echo json_encode($jsonArray); 
            }
        }
        $musqli->close();
    } else {
         $jsonArray = array('cid' => '1010','ret' => '2');
		 		echo json_encode($jsonArray); 
    }