<?php
	require('connection.php');
	if (isset($_POST['phonenum'])) {
        
		$phonenum = htmlspecialchars($_POST['phonenum']);
        $select_sql = "select * from lo_user where phone_num =".$phonenum;
        
        $result = $mysqli->query($select_sql);
        
        if($result && $result->num_rows == 0)
        {
            $jsonArray = array('cid' => '1000','ret' => '1');
            
            echo json_encode($jsonArray);
        } else {
         	$jsonArray = array('cid' => '1000','ret' => '0');
            
            echo json_encode($jsonArray);
        }
        $musqli->close();
    } else {
     	$jsonArray = array('cid' => '1000','ret' => '2');
            
        echo json_encode($jsonArray);
    }