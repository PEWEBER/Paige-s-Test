<?php
require("page.php");
$gallerypage = new Page();

$gallerypage->content="<!-- page content -->
<section>
</section>";
    $gallerypage->Display();
    
$pictures = array('laptop.jpeg','student.jpg', 'test.png', 'lipscomb.jpeg');
shuffle($pictures);
for ($i = 0; $i < 4; $i++) {
          echo "<td style=\"width: 10%; text-align: center\">
                <img src=\"";
          echo $pictures[$i];
          echo "\"/></td>";
        }


?>
