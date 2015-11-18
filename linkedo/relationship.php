<?php

	require('connection.php');

	if(isset($_POST['from_id']) && isset($_POST['attention_id']) && isset($_POST['is_add'])) {
        $from_id = htmlspecialchars($_POST['from_id']);
        $attention_id = htmlspecialchars($_GET['attention_id']);
        $is_add = htmlspecialchars($_POST['is_add']);
        
        $select_sql = "select * from lo_relationship where from_id=".$from_id." and attention_id=".$attention_id;
        
        $result = $mysqli->query($select_sql);
        
        if($result && $result->num_rows==0) {
            
             if($is_add == 1 && $form_id != $attention_id) {
          		  $sql = "insert into lo_relationship values(".$from_id.",".$attention_id.")";
            
           		 $result = $mysqli->query($sql);
	
           		 if($result) {
                	 $sql = "update lo_user l set l.myattention_num = l.myattention_num + 1 where id =".$from_id." and l.myattention_num > 0";
                     $mysqli->query($sql);
                     
                     $sql = "update lo_user l set l.attentionme_num = l.attentionme_num + 1 where id =".$attention_id." and l.attentionme_num > 0";
                     $mysqli->query($sql);
                     
               		 $jsonArray = array('cid' => '1004','ret' => '1','add_attention' => '1');
		 			echo json_encode($jsonArray);
            	} else {
             		$jsonArray = array('cid' => '1004','ret' => '0','add_attention' => '0');
		 			echo json_encode($jsonArray);  
            	}
            
             } else {
             
             	$arr = array("cid" => "1004",'ret' => '0','delete_attention' => '0');
				echo json_encode($arr);
             }
        } else {
            if($is_add == 0 && $form_id != $attention_id) {
          		  $sql = "delete from lo_relationship where from_id=".$from_id." and attention_id =".$attention_id;
             	  $result = $mysqli->query($sql);
           		 echo 1;
           		 if($result) {
                      $sql = "update lo_user l set l.myattention_num = l.myattention_num - 1 where id =".$from_id." and l.myattention_num > 0";
                     $mysqli->query($sql);
                     
                     $sql = "update lo_user l set l.attentionme_num = l.attentionme_num - 1 where id =".$attention_id." and l.attentionme_num > 0";
                     $mysqli->query($sql);
                     
                	$jsonArray = array('cid' => '1004','ret' => '1' ,'delete_attention' => '1');
		 			echo json_encode($jsonArray);
           		 } else {
               		$jsonArray = array('cid' => '1004','ret' => '0' ,'delete_attention' => '0');
		 			echo json_encode($jsonArray);
           		 }
            
            } else {
                $arr = array("cid" => "1004",'ret' => '0');
				echo json_encode($arr);
            }
            
			
		}
        
       
        $mysqli->close();
        
	}else {
		$arr = array("cid" => "1004",'ret' => '2');
		echo json_encode($arr);
	}