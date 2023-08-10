<?php 
   
    include('db_conn.php');  
    include('add_Img_script.php');
    $title =  $_REQUEST['title'];
    $desc = $_REQUEST['description'];
    $status =  $_REQUEST['status'];
    $role =  $_REQUEST['role'];


if(!empty($title) || !empty($desc) || !empty($status) || !empty($role)){
    
    $sql = "INSERT INTO tb_album (a_id, title, description, status,role) VALUES (0,'$title', '$desc', '$status','$role')";

   
    
    if(mysqli_query($conn, $sql)){


     header('Location:data.php');
      
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
else{
    echo "All field are required";
    die();
}

   
    ?>
