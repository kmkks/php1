<?php

	require('connection.php');
	echo 1;
	if(isset($_POST['user_id'])) {
    	echo 1;
   	    $user_id = htmlspecialchars($_POST['user_id']);
    	$sql = "select * from lo_share where is_delete=0 and user_id in (select attention_id from lo_relationship where from_id=".$user_id.") order by date desc";
        echo $sql;
         $result = $mysqli->query($sql);
            
        if($result && $result->num_rows > 0) {
        	$arr = $result
            $jsonArray = array('cid' => '1016', 'ret' => '1', 'responseData' => $arr);
            
            echo json_encode($jsonArray);
        } else {
            $jsonArray = array('cid' => '1016', 'ret' => '0');
            
            echo json_encode($jsonArray);  
        }
        
    } else {
        $jsonArray = array('cid' => '1016', 'ret' => '2');
            
        echo json_encode($jsonArray); 
     	   
    }