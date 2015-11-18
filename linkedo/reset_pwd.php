<?php
	require('connection.php');

	if(isset($_POST['reset_type'])) {
  		$reset_type = htmlspecialchars($_POST['reset_type']);
          
       if($reset_type == 1) {
           
           if(isset($_POST['phonenum']) && isset($_POST['userpwd']) && isset($_POST['newpwd'])) {
            	$phonenum = htmlspecialchars($_POST['phonenum']);
    			$userpwd = htmlspecialchars($_POST['userpwd']);
        		$newpwd = htmlspecialchars($_POST['newpwd']);
                $sql = "select * from lo_user where phone_num ='".$phonenum."' and password = '".$userpwd."'";

                $result = $mysqli->query($sql);
                                       
           		 if($result && $result->num_rows > 0) {
               		 $sql = "update lo_user set password = '".$newpwd."' where phone_num = '".$phonenum."'";  
                	
              		 $res = $mysqli->query($sql);
                
                	 if($res) {
                 		$jsonArray = array('cid' => '1018', 'ret' => '1');   
                    	echo json_encode($jsonArray);
                	 } else {
               	     	$jsonArray = array('cid' => '1018', 'ret' => '0');   
                    	echo json_encode($jsonArray);
               		 }
                 } else {
               	     	$jsonArray = array('cid' => '1018', 'ret' => '0');   
                    	echo json_encode($jsonArray);
               	 }
                                           
           } else {
               $jsonArray = array('cid' => '1018', 'ret' => '2');   
       		   echo json_encode($jsonArray); 
           }
           
       } else {
           if(isset($_POST['phonenum']) && isset($_POST['newpwd'])) { 
               $sql = "update lo_user set password = '".$newpwd."' where phone_num = '".$phonenum."'";  
               $res = $mysqli->query($sql);  
               
               if($res) {
               		$jsonArray = array('cid' => '1018', 'ret' => '1');   
              		echo json_encode($jsonArray);
        	   } else {
               		$jsonArray = array('cid' => '1018', 'ret' => '0');   
               		echo json_encode($jsonArray);
        	   }
           } else {
               
            	$jsonArray = array('cid' => '1018', 'ret' => '2');   
       			 echo json_encode($jsonArray);    
           }
       }
        
    } else {
        $jsonArray = array('cid' => '1018', 'ret' => '2');   
        echo json_encode($jsonArray);  
     	   
    }
	
    