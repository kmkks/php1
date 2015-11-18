<?php
	require('connection.php');
 	$uptypes=array(   
   	 	'image/png',      	  
	); 
	
	$max_file_size = 5000000;

	$destination_folder = "./upload/";
//file_mode_info('./upload/');
	//是否生成预览类型
	$imgpreview = 1;

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['type'])) {
        
         $id = htmlspecialchars($_POST['id']);
        $type = htmlspecialchars($_POST['type']);
		if (!is_uploaded_file($_FILES["upfile"]['tmp_name'])) {
			$jsonArray = array('cid' => '1015','ret' => '2','reason' => '1');
            echo json_encode($jsonArray);
			exit;
		}
		$file = $_FILES["upfile"];
		
		if ($max_file_size < $file['size']) {
			$jsonArray = array('cid' => '1015','ret' => '2', 'reason' => '2');
            echo json_encode($jsonArray);
			exit;
		}
		if (!in_array($file['type'], $uptypes)) {
			$jsonArray = array('cid' => '1015','ret' => '2','reason' => '3');
            echo json_encode($jsonArray);
			exit;
		}

        $s =new SaeStorage();
        
        $domin = 'userupload';
        $sql = '';
        if($type) {
             $filename = "linkedo/".$id."/portrait.png";
             $url = "http://linkedo-userupload.stor.sinaapp.com/".$filename;  
       		 $sql = "update lo_user set portraitURL ='".$url."' where id =".$id;
        } else {
             $filename = "linkedo/".$id."/bgimage.png";
             $url = "http://linkedo-userupload.stor.sinaapp.com/".$filename;
       		 $sql = "update lo_user set bgimageURL ='".$url."' where id =".$id;
        }
       
        $s->upload($domin,$filename,$_FILES["upfile"]['tmp_name']);
        
       
        
        $result = $mysqli->query($sql);
        if($result) {
            $jsonArray = array('cid' => '1015','ret' => '1');
        } else {
            $jsonArray = array('cid' => '1015','ret' => '2','reason' => '0');
        }
        
        echo json_encode($jsonArray); 


    } else {
        $jsonArray = array('cid' => '1015','ret' => '0');
    }
	
	$mysqli->close();