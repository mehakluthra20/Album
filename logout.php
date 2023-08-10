<?php
$_SESSION["mysusername"] = $myusername;
$_SESSION["mypassword"] = $mypassword;
$_SESSION["role"] = $role;
header("Location: index.html");
?>