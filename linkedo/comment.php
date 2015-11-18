<?php
	require('connection.php');

	if(isset($_POST['target_id']) && isset($_POST['type'])) {
  
        $target_id = htmlspecialchars($_POST['target_id']);
        $type = htmlspecialchars($_POST['type']);
       
        
         if($type == 1) {
            
            $sql = "select * from lo_comment_share where share_id=".$target_id." order by date desc";
  
            $result = $mysqli->query($sql);
            if($result && $result->num_rows > 0) {
                $arr = $result->fetch_assoc();
                $jsonArray = array('cid' => '1011','ret' => '1','type' => '1','response_data' => $arr);
		 		echo json_encode($jsonArray); 
            } else {
                 $jsonArray = array('cid' => '1011','ret' => '0','type' => '1');
		 		echo json_encode($jsonArray); 
            }
            
        } else {
           
           	$sql = "select * from lo_comment_transmit where transmit_id=".$target_id." order by date desc";
  
            $result = $mysqli->query($sql);
            
            if($result && $result->num_rows > 0) {
                $arr = $result->fetch_assoc();
                $jsonArray = array('cid' => '1011','ret' => '1','type' => '0','response_data' => $arr);
		 		echo json_encode($jsonArray); 
            } else {
                 $jsonArray = array('cid' => '1011','ret' => '0','type' => '0');
		 		echo json_encode($jsonArray);
            }
 
        }
    	$mysqli->close();
    } else {
         $jsonArray = array('cid' => '1008','ret' => '2');
		 	echo json_encode($jsonArray); 
    }
    