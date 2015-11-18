<?php

	require('connection.php');

	if(isset($_POST['share_id'])) {
     	$share_id = htmlspecialchars($_POST['share_id']);
        //$length = htmlspecialchars($_POST['length']);
        // $sql = "select * from lo_share s,lo_transmit t where s.id=".$target_id." or ";
        // $sql = "select * from lo_transmit where share_id in (select id from lo_share where field_id = 1)"
        // $sql = "select s.*,t.* from lo_share s left join lo_transmit t on s.id = t.share_id where s.field_id = 1 LIMIT 0, 30 ";
        
        $sql = "select s.id,s.user_id,s.field_id,s.headline,s.content,s.date,s.images  from lo_share s where id = ".$share_id." and is_delete = 0";
    
        $result = $mysqli->query($sql);
        if($result && $result->num_rows > 0) {
            $arr = $result->fetch_assoc();
            $images = $arr['images'];
            $imaegArray = explode("|",$images);
            
            $json_images = array();
            $url = 'http://linkedo-userupload.stor.sinaapp.com/';
            for($i = 0; $i < count($imaegArray) - 1; $i++) {
             	echo $imaegArray[$i];
                 $json_images['image'.$i] = $url.$imaegArray[$i];
            }
            
            
            $arr['images'] = $json_images;
            
            $json_array = array('cid' => '1013','ret' => '1', 'responseData' => $arr);
            echo json_encode($json_array);
            
        } else {
         	$json_array = array('cid' => '1013','ret' => '0');
            echo json_encode($json_array);   
        }
        
    } else {
        $json_array = array('cid' => '1013','ret' => '2');
        echo json_encode($json_array);
    }