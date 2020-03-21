<?php 
/**
 * This is the Hidden Page for CRUD operations where the user logins and a session is started.
 * This session by declaring session_start() makes it possible to retrieve a false or true validUser.
 * Depending on the boolean, one is either redirected directly to Homepage or allowed to stay.
 * There is also an option to log out, where the logout first checks if there is an active session or not.
 * Due to time constraints we didn't find a proper way to do all CRUD on this page and as such we decided to wrap it up.
 */
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


<link rel="stylesheet" href="css/style.css" type="text/css">