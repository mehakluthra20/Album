 <?php
require_once('db_conn.php');
$db=$conn;
$tableName='gallery';
$albumId=$_GET['albumId'];

$fetchImage= fetch_image($tableName,$albumId);
      
function fetch_image($tableName,$albumId){
   global $db;
   $tableName= trim($tableName);
   if(!empty($tableName)){
  $query = "SELECT * FROM ".$tableName." WHERE a_id=".$albumId;
  $result = $db->query($query);
if ($result->num_rows > 0) {
    $row= $result->fetch_all(MYSQLI_ASSOC);
    return $row;       
  }else{
    
    echo "No Image is stored in the database";
  }
}else{
  echo "you must declare table name to fetch Image";
}
}  
?>