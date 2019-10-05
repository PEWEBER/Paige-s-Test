<?php
  require_once("file_exceptions.php");

  // create short variable names
  $firstname = $_POST['firstname'];                                           
  $lastname = $_POST['lastname'];                                             
  $age = (int) $_POST['age'];
  $document_root = $_SERVER['DOCUMENT_ROOT'];                                   
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Paige's Test 1</title>
  </head>
  <body>
    <?php
    
      $outputstring = $firstname."\t".$lastname."\t".$age."\n";

      // open file for appending
      try
      {
        if (!($fp = @fopen("info.txt", 'ab'))) {
            throw new fileOpenException();
        }
      
        if (!flock($fp, LOCK_EX)) {
           throw new fileLockException();
        }
      
        if (!fwrite($fp, $outputstring, strlen($outputstring))) {
           throw new fileWriteException();
        }

        flock($fp, LOCK_UN);
        fclose($fp);
        echo "<p>Order written.</p>";
      }
      catch (fileOpenException $foe)
      {
         echo "<p><strong>Orders file could not be opened.<br/>
               Please contact our webmaster for help.</strong></p>";
      }
      catch (Exception $e)
      {
         echo "<p><strong>Your order could not be processed at this time.<br/>
               Please try again later.</strong></p>";
      }
    ?>
  </body>
</html>
