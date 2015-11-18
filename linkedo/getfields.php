<?php
	
	require('connection.php');

	if(isset($_POST['user_id']) && isset($_POST['is_attention'])) {
        
		$user_id = htmlspecialchars($_POST['user_id']);
        $is_attention = htmlspecialchars($_POST['is_attention']);
        if($is_attention) {
            	
            $sql = "select * from lo_field where id in (select field_id from lo_user_field where user_id = ".$user_id.")";
           
         	$result = $mysqli->query($sql);
             if($result && $result->num_rows > 0) {
            	$arr = $result->fetch_assoc();
                $json_array = array('cid' => '1003','ret' => '1', 'responseData' => $arr);
                echo json_encode($json_array);
            
            }
            
        } else {
         	$sql = "select * from lo_field where id not in (select field_id from lo_user_field where user_id = ".$user_id.")";
            
            $result = $mysqli->query($sql);
            if($result && $result->num_rows > 0) {
            	$arr = $result->fetch_assoc();
                $json_array = array('cid' => '1003','ret' => '1', 'responseData' => $arr);
                echo json_encode($json_array);
            
            }
        }
        
     $musqli->close();
	}else {
         $json_array = array('cid' => '1003','ret' => '2');
    	echo json_encode($json_array); 
	}

//echo json_encode($mysql->fetch_all(MYSQLI_ASSOC));

	