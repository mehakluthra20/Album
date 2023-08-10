<?php
include_once 'db_conn.php';
$result = mysqli_query($conn,"SELECT * FROM tb_album where status='Published' and role='Premium'");
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
    <!-- <th>Status</th>
    <th>User Type</th> -->
    <th></th>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["a_id"]; ?></td>
    <td><?php echo $row["Title"]; ?></td>
    <td><?php echo $row["Description"]; ?></td>
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
<button  id ="btn" onclick="history.back()">Go Back</button>
</div>
</div>
 </body>
</html>
