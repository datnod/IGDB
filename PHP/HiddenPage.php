<?php
session_start();

/*
*HTML divs booleans for create,delete,update shown if true, by default these are false.
*/

$createBool = false;
$updateBool = false;
$deleteBool  = false;

if($_SESSION["validUser"] === true){
  
  session_destroy();

}else{ 
    header("Location: index.php");
    exit;
}

?>

<html >

  <body>

    <div id="create" <?php if ($createBool===false){?>style="display:none"<?php } ?>>
      <?php 
        echo "Create Operation";
      ?>
    </div>

    <div id="delete" <?php if ($deleteBool===false){?>style="display:none"<?php } ?>>
      <?php 
        echo "Delete Operation";
      ?>
    </div>

    <div id="update" <?php if ($updateBool===false){?>style="display:none"<?php } ?>>
      <?php 
        echo "Update Operation";
      ?>
    </div>

  </body>

</html>

