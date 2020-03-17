<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $headerTitle ?></title>
    <link rel="stylesheet" href="css/header.css">
</head>


<div class="container indigo topBotomBordersOut">
<div class ="login-container">
  <ul class="nav navbar-nav navbar-right">
  
  <form method="post">
  <input type ="account" placeholder="Username" name="username">
  <input type ="password" placeholder="Password" name="password">
  <button type="submit" name="submit">Login</button>
  </form>
</div>
<a href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="search.php">Search</a>
  <a href="toplist.php">Toplist</a>
</div>

 
 
  
<?php
include_once '..\PHP\RestFulAPI\database.php';
if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $password=$_POST['password'];

  $sql= "SELECT * FROM myigdb.auth WHERE user= '$username' AND pass = '$password'";
  
  $dataB = new Database();
  $conn = $dataB->connectDatabase();  
       
  $res=$conn->query($sql);
  $num = $res->rowCount();
  if($num==1){
    session_start();
    $_SESSION["validUser"] = "Peter";
    header("location: HiddenPage.php");
    
  }else{
    echo ("Unsucces");
  }
  

}
?>