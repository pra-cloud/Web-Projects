<!DOCTYPE html>
<html lang="en">
  <head>
</head>
  <body>
<h1> connecting sql by php </h1>
<?php 
$link = mysqli_connect("localhost","root","","prateek");

if(mysqli_connect_error()){
  die("error:unable to connect" .
mysqli_connect_error());
}
else{
echo "<p> connected successfully </p>";
}

?>
  </body>
</html>