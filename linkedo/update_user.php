<?php
	
	require('connection.php');

	if(isset($_POST['user_id'])) {
    
        $user_id = htmlspecialchars($_POST['user_id']);
        
    	if(isset($_POST['nickname'])) {
    		$nickname = htmlspecialchars($_POST['nickname']);
        
        	$sql = "update lo_user set nickname = '".$nickname."' where id =".$user_id;
            
            $result = $mysqli->query($sql);
            
            if($result) {
             	$jsonArray = array('cid' => '1019','ret' => '1');
                
                echo $jsonArray;
                
            } else {
                
                $jsonArray = array('cid' => '1019','ret' => '0');
                
                echo $jsonArray;
            }
		}

		if(isset($_POST['introduce'])) {
    		$introduce = htmlspecialchars($_POST['introduce']);
            
            $sql = "update lo_user set introduce = '".$introduce."' where id =".$user_id;
            
            $result = $mysqli->query($sql);
            
            if($result) {
             	$jsonArray = array('cid' => '1019','ret' => '1');
                
                echo $jsonArray;
                
            } else {
                
                $jsonArray = array('cid' => '1019','ret' => '0');
                
                echo $jsonArray;
            }
		}

		if(isset($_POST['gender'])) {
    		$gender = htmlspecialchars($_POST['gender']);
            
            $sql = "update lo_user set gender = '".$gender."' where id =".$user_id;
            
            $result = $mysqli->query($sql);
            
            if($result) {
             	$jsonArray = array('cid' => '1019','ret' => '1');
                
                echo $jsonArray;
                
            } else {
                
                $jsonArray = array('cid' => '1019','ret' => '0');
                
                echo $jsonArray;
            }
		}
        
        $mysqli->close();
	
    } else {
        
       
        $jsonArray = array('cid' => '1019','ret' => '2');
                
         echo $jsonArray;
    
    }