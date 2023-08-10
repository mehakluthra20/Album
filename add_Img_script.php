<?php
require_once('db_conn.php');
$db=$conn; 
$tableName='gallery'; 

session_start();
if(isset($_POST['submit'])){ 
  
   echo upload_image($tableName, $_GET['albumId']);
} 
  function upload_image($tableName, $albumId){
   
    $uploadTo = "uploads/"; 
    $allowedImageType = array('jpg','png','jpeg','gif');
    $imageName = array_filter($_FILES['image_gallery']['name']);
    $imageTempName=$_FILES["image_gallery"]["tmp_name"];
    $tableName= trim($tableName);
if(empty($imageName)){ 
   $error="Please Select Images..";
   return $error;
}else if(empty($tableName)){
   $error="You must declare table name";
   return $error;
}else{
   $error=$savedImageBasename='';
   foreach($imageName as $index=>$file){
         
    $imageBasename = basename($imageName[$index]);
    $imagePath = $uploadTo.$imageBasename; 
    $imageType = pathinfo($imagePath, PATHINFO_EXTENSION); 
 if(in_array($imageType, $allowedImageType)){ 
 
    if(move_uploaded_file($imageTempName[$index],$imagePath)){ 
        

     $savedImageBasename .= "('".$imageBasename."'),";     
    }else{ 
     $error = 'File Not uploaded ! try again';
  } 
}else{
    $error .= $_FILES['file_name']['name'][$index].' - file extensions not allowed<br> ';
 }
 }
    save_image($savedImageBasename, $tableName, $albumId);
}
    return $error;
}

 function save_image($savedImageBasename, $tableName, $albumId){
      global $db;
      if(!empty($savedImageBasename))
      { 
      $value = trim($savedImageBasename, ',');
      $saveImage="INSERT INTO ".$tableName." (image_name,a_id) VALUES ($value, $albumId)";
      $exec= $db->query($saveImage);
      if($exec){
        echo "Images are uploaded successfully";  
       }else{
        echo  "Error: " .  $saveImage . "<br>" . $db->error;
       }
      }
    }     
    
?>