
<?php
include('db_conn.php');

$myusername=$_POST['user']; 
$mypassword=$_POST['pass']; 



$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);


$sql="SELECT * FROM tb_users WHERE email='$myusername' and password='$mypassword'";
$result = mysqli_query($conn, $sql);  



$count=mysqli_num_rows($result);



if($count==1){
$result=mysqli_fetch_array($result);
$role = $result['role'];


if($role =='admin'){
 $link = 'data.php';
 }
elseif($role =='normal'){
 $link = 'normal.php';
 }
elseif($role =='premium'){
    $link = 'premium.php';
    }

$_SESSION["mysusername"] = $myusername;
$_SESSION["mypassword"] = $mypassword;
$_SESSION["role"] = $role;
header("Location: ".$link."");
}

else {
echo "Wrong Username or Password";
}

?>
