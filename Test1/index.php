<?php 
	require("page.php");
    
    class homepage extends Page
    {
        private $row2buttons = array(
                                     "Form" => "form.php",
                                     "View Records" => "ViewRecords.php",
                                     );
        public function Display()
        {
            echo "<html>\n<head>\n";
            $this->DisplayTitle();
            $this->DisplayKeywords();
            $this->DisplayStyles();
            echo "</head>\n<body>\n";
            $this->DisplayHeader();
            $this->DisplayMenu($this->buttons);
            $this->DisplayMenu($this->row2buttons);
            echo $this->content;
            $this->DisplayFooter();
            echo "</body>\n</html>\n";
        }
        
    }
    $homepage = new homepage();
    $homepage->content="<p>Welcome to Paige's Test 1 Website. Have a look around!</p>";
    
    $homepage->Display();

?>
