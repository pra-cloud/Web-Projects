
<!--index.html-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Our Lovely Course</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="styling.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
      
      <style>
      
       h1{
 color:white;
           text-align: center;
 }
 h3{
 color:#42d5ce;
 }
 .containingDiv{
 border:1px solid #7c73f6;
 margin-top: 100px;
 border-radius: 15px;
     color: white;
 }
      
.btn{     background-color: rgb(29, 167, 179);     color: #fff;     font-size: 20px;     padding: 8px 20px;     border-radius: 8px;  } 
.btn:hover{     background-color: rgba(29, 167, 179, 0.5); } 
      
</style>

  </head>
  <body data-spy="scroll" data-target="#mynavBar">
      
      <!--Create navigation bar with scrollspy-->
      <nav role="navigation" class="navbar navbar-custom navbar-fixed-top" id="mynavBar">
        
          <div class="container-fluid">
              <div class="navbar-header">
                  <a class="navbar-brand">Projects of WebDevelopment</a>
                  <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                      <span class="sr-only">Toggle navigation</span>      
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
              </div>
              <div class="navbar-collapse collapse" id="navbarCollapse">
                  <ul class="nav navbar-nav navbar-right">
                      <li><a href="http://prateek.offyoucode.co.uk/">Home</a></li>
                  </ul>
              </div>
          </div>
      </nav>
      <!-- home section -->
      <div class="container-fluid">
 <div class="row">
 <div class=" col-sm-offset-2 col-sm-2 col-lg-8
containingDiv">
  <h1>Please give your review here</h1>
     
  <?php
//mysqli_connect(host, username, password, dbname)
$link = @mysqli_connect("localhost","prateek1_prateek","prateek@12345","prateek1_db") or
die("ERROR: Unable to connect: " .
mysqli_connect_error());
?>
<?php
//get user inputs
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$text = $_POST["text"];
//error messages
$missingFirstname = "<p><strong>Please enter your
firstname!</strong></p>";
$missingLastname = "<p><strong>Please enter your
lastname!</strong></p>";
$missingemail = "<p><strong>Please enter your
email!</strong></p>";
$invalidemail = "<p><strong>Please enter a valid email
address!</strong></p>";
$missingtext = "<p><strong>Please enter your review!</strong></p>";
if($_POST["submit"]){
//check for errors
 if(!$firstname){
 $errors .= $missingFirstname;
 }else{
 $firstname = filter_var($firstname,
FILTER_SANITIZE_STRING);
 }
 if(!$lastname){
 $errors .= $missingLastname;
 }else{
 $lastname = filter_var($lastname,
FILTER_SANITIZE_STRING);
 }
 if(!$email){
 $errors .= $missingemail;
 }else{
 $email = filter_var($email,
FILTER_SANITIZE_EMAIL);
 if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
 $errors .= $invalidemail;
 }
 }
 if(!$text){
  $errors .=$missingtext;
 }
    if($errors){
 $resultMessage = '<div class="alert alertdanger">' . $errors .'</div>';
 echo $resultMessage;
 }else{
 //no errors, prepare variables for the query
 $tblname = "userh";
 $firstname = mysqli_real_escape_string($link,
$firstname);
 $lastname = mysqli_real_escape_string($link,
$lastname);
 $email = mysqli_real_escape_string($link, $email);
 $text = mysqli_real_escape_string($link,
$text);

 //execute insert query
 if(!$id){
 $sql = "INSERT INTO userh (firstname,
lastname, email, text) VALUES ('$firstname',
'$lastname', '$email', '$text')";
 }else{
 $sql = "INSERT INTO userh (ID, firstname,
lastname, email, text) VALUES ('$id', '$firstname',
'$lastname', '$email', '$text')";
 }
 if(mysqli_query($link, $sql)){
 $resultMessage = '<div class="alert alertsuccess"></div>';
 echo $resultMessage;
 }else{
 $resultMessage = '<div class="alert alertwarning">ERROR: Unable to excecute: ' .$sql. '. ' .
mysqli_error($link). '</div>';
 echo $resultMessage;
 }
 }

}
?>   
     
     
     
     
     
     
        
            <form action="form2.php"
method="post">
 <div class="form-group">
 <label
for="firstname">Firstname:</label>
 <input type="text" id="firstname"
placeholder="Firstname" class="form-control"
name="firstname" maxlength="20">
 </div>
 <div class="form-group">
 <label
for="lastname">Lastname:</label>
 <input type="text" id="lastname"
placeholder="Lastname" class="form-control"
name="lastname" maxlength="20">
 </div>
 <div class="form-group">
 <label for="email">Email:</label>
 <input type="email" id="email"
placeholder="Email" class="form-control" name="email"
maxlength="30">
 </div>
 <div class="form-group">
<label for="text">Review of website:</label>
<textarea id="text" class="form-control" name="text" rows="4" cols="50"> </textarea>
 </div>
 <input type="submit" name="submit"
class="btn" value="Send data">


 </form>
      </div>
          </div>
      </div>
      <!--Add a footer for our website-->
      <div class="footer">
          <div class="container">
              <p>&copy;Develop by Prateek Mishra</p>
              <p>Regards to eduonix.com</p>
          </div>
      </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>
      </html>
      