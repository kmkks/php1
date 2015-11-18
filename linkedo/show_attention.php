<?php
	
	require('connection.php');

	if(isset($_POST['user_id']) && isset($_POST['type'])) {
    	
        $user_id = htmlspecialchars($_POST['user_id']);
        $type = htmlspecialchars($_POST['type']);
        
        if($type == 1) {
            $sql = "select * from lo_user u where u.id in (select attention_id from lo_relationship where from_id = ".$user_id.")";
            
            $result = $mysqli->query($sql);
          
            if($result && $result->num_rows) {
                $arr = $result->fetch_assoc();
                
                $jsonArray = array('cid' => '1016','ret' => '1','responseData' => $arr);
                
                echo json_encode($jsonArray);
             	   
            } else {
                $jsonArray = array('cid' => '1016','ret' => '0');
                
                echo json_encode($jsonArray);
            }
            
            
        } else {
         	$sql = "select * from lo_user u where u.id in (select from_id from lo_relationship where attention_id = ".$user_id.")";  
            
            $result = $mysqli->query($sql);
            
            if($result && $result->num_rows) {
                $arr = $mysqli->fetch_assoc();
                
                $jsonArray = array('cid' => '1017','ret' => '1','responseData' => $arr);
                
                echo json_encode($jsonArray);
             	   
            } else {
                $jsonArray = array('cid' => '1017','ret' => '0');
                
                echo json_encode($jsonArray);
            }
        }
    
    } else {
        
         $jsonArray = array('cid' => '1017','ret' => '2');
                
         echo json_encode($jsonArray);
        
    }