<?php

	require('connection.php');

	if(isset($_POST['user_id']) && isset($_POST['field_id']) && isset($_POST['headline'])  && isset($_POST['content'])) {
    
        $user_id = htmlspecialchars($_POST['user_id']);
        $field_id = htmlspecialchars($_POST['field_id']);
        $headline = htmlspecialchars($_POST['headline']);
        $content = htmlspecialchars($_POST['content']);
        
        
        $sql = "INSERT INTO lo_share (headline, content, field_id, user_id) VALUES ('".$headline."','".$content."',".$field_id.",".$user_id.");";
        $result = $mysqli->query($sql);
            
        if($result) {
            
        	 $images = $_FILES['images']['error'];
         	 $i = 0;
             $domin = 'userupload';
             $id = $mysqli->insert_id;
             $filespath = '';
             foreach($images as $key => $error) {
                 if($error == UPLOAD_ERR_OK) {
                     $filename = "linkedo/".$user_id."/".$id."/".time().$i.".png";
                     $tmp_name = $_FILES['images']['tmp_name'][$key];
                     $s =new SaeStorage();
                     $filespath = $filespath.$filename.'|'; 
                     $s->upload($domin,$filename,$tmp_name);
                     $i++;
                 } else {
                     $jsonArray = array('cid' => '1005','ret' => '1','image_error' => $i);
		 			 echo json_encode($jsonArray);  
           	 	 }
                
             }   
                
            $sql = "update lo_share set images = '".$filespath."' where id=".$id;
           	$result = $mysqli->query($sql);  
            if($result) {
                $jsonArray = array('cid' => '1005','ret' => '1');
		 		echo json_encode($jsonArray); 
            } else {
                $jsonArray = array('cid' => '1005','ret' => '0');
		 		echo json_encode($jsonArray);
            }
               
         } else {
                $jsonArray = array('cid' => '1005','ret' => '0');
		 		echo json_encode($jsonArray);  
            }
        
       
        $musqli->close();
    } else {
         $jsonArray = array('cid' => '1005','ret' => '2');
		 echo json_encode($jsonArray);  
    }