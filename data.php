<?php
include_once 'db_conn.php';
$result = mysqli_query($conn,"SELECT * FROM tb_album");
?>
<!DOCTYPE html>
<html>
 <head>

 </head>
 <link rel = "stylesheet" type = "text/css" href = "style.css">  
 <style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    width:200px;
    padding: 8px;

}

tr:nth-child(even) {
    background-color: white;
}
    </style>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<div class="divForm"><br>
<h2>Album List</h2>

<div class="container">
  <table>
  
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Description</th>
    <th>Status</th>
    <th>User Type</th>
    <th colspan="3"></th>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["a_id"]; ?></td>
    <td><?php echo $row["Title"]; ?></td>
    <td><?php echo $row["Description"]; ?></td>
    <td>
         <input type="radio" name="status_<?php echo $row["a_id"];?>" value="Published" <?php if($row['Status']=="Published"){ echo "checked";}?>/><br>Published
         <input type="radio" name="status_<?php echo $row["a_id"];?>" value="Unpublished" <?php if($row['Status']=="Unpublished"){ echo "checked";}?>/>Unpublished
</td>
   
<td>
         <input type="radio" name="role_<?php echo $row["a_id"];?>" value="Normal" <?php if($row['Role']=="Normal"){ echo "checked";}?>/><br>Normal
         <input type="radio" name="role_<?php echo $row["a_id"];?>" value="Premium" <?php if($row['Role']=="Premium"){ echo "checked";}?>/>Premium
</td>
    <td><a href="addImg.php?albumId=<?php echo $row["a_id"];?>" style="color:green;font-style: italic;
    font-weight: bold; text-decoration:none; margin:20px">Add</a></td>
    <td><a href="showImg.php?albumId=<?php echo $row["a_id"];?>" style="text-decoration:none; color:blue;    font-style: italic;
    font-weight: bold; margin:20px">Display</a></td>


</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
<br><br>
    <a href="admin.html" style="text-decoration:none;  margin:20px" id="btn">Add Album</a>
    <br><br>

    <button  id ="btn" onclick="history.back()">Go Back</button>
    <br><br>
</div>
</div>
 </body>
</html>

