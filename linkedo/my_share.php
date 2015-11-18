<?php

	require('connection.php');

	if(isset($_POST['user_id']) && isset($_POST['length'])) {
     	$user_id = htmlspecialchars($_POST['user_id']);
        $length = htmlspecialchars($_POST['length']);
        // $sql = "select * from lo_share s,lo_transmit t where s.id=".$target_id." or ";
        // $sql = "select * from lo_transmit where share_id in (select id from lo_share where field_id = 1)"
        // $sql = "select s.*,t.* from lo_share s left join lo_transmit t on s.id = t.share_id where s.field_id = 1 LIMIT 0, 30 ";
        
        $sql = "select * from lo_share where user_id = ".$user_id." and is_delete = 0 order by date desc limit 0,".$length;
     
        $result = $mysqli->query($sql);
        if($result && $result->num_rows > 0) {
            $arr = $result->fetch_assoc();
            $json_array = array('cid' => '1014','ret' => '1', 'responseData' => $arr);
            echo json_encode($json_array);
            
        } else {
         	$json_array = array('cid' => '1014','ret' => '0');
            echo json_encode($json_array);   
        }
        
    } else {
        $json_array = array('cid' => '1014','ret' => '2');
        echo json_encode($json_array);
    }