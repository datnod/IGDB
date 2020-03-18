<?php 
session_start();

if( isset($_SESSION['validUser']) === true)
{
?>
  <form method="post">  
    <button type="submit" name="logout">Logout</button>
  </form>

<?php }else if(!isset($_SESSION['validUser']))
{ 
  
  header("Location: index.php");
  exit;
}

if(isset($_POST['logout']))
{
    if(session_status())
    {
      session_destroy();
      header("Location: index.php");
      exit;
    }
}
?>

