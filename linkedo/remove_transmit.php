<?php
	require('connection.php');
	if(isset($_POST['transmit_id'])) {
    	$transmit_id = htmlspecialchars($_POST['transmit_id']);
    
 		$sql = "update lo_transmit set is_delete = 1 where id =".$transmit_id;
        $result = $mysqli->query($sql);
		if ($result) {
            $jsonArray = array('cid' => '1007','ret' => '1');
		 	echo json_encode($jsonArray);   
        } else {
            $jsonArray = array('cid' => '1007','ret' => '0');
		    echo json_encode($jsonArray);  
         }
        $musqli->close();
    } else {
        $jsonArray = array('cid' => '1007','ret' => '2');
		 echo json_encode($jsonArray); 
    }