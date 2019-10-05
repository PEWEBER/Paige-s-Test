<?php
class Page
{
  // class Page's attributes
  public $content;
  public $title = "Paige's Test 1";
  /*public $keywords = "TLA Consulting, Three Letter Abbreviation,
                     some of my best friends are search engines";*/
  public $buttons = array("Home"   => "index.php",
                        "Gallery"  => "gallery.php",
                    );

  // class Page's operations
  public function __set($name, $value)
  {
    $this->$name = $value;
  }

  public function Display()
  {
    echo "<html>\n<head>\n";
    $this -> DisplayTitle();
    $this -> DisplayKeywords();
    $this -> DisplayStyles();
    echo "</head>\n<body>\n";
    $this -> DisplayHeader();
    $this -> DisplayMenu($this->buttons);
    echo $this->content;
    $this -> DisplayFooter();
    echo "</body>\n</html>\n";
  }

  public function DisplayTitle()
  {
    echo "<title>".$this->title."</title>";
  }

  public function DisplayKeywords()
  {
    echo "<meta name='keywords' content='".$this->keywords."'/>";
  }

  public function DisplayStyles()
  { 
    ?>   
    <link href="styles.css" type="text/css" rel="stylesheet">
    <?php
  }

  public function DisplayHeader()
  { 
    ?>   
    <!-- page header -->
    <header>
      <h1>Paige's Test 1</h1>
    </header>
    <?php
  }

  public function DisplayMenu($buttons)
  {
    echo "<!-- menu -->
    <nav>";

    while (list($name, $url) = each($buttons)) {
      $this->DisplayButton($name, $url, 
               !$this->IsURLCurrentPage($url));
    }
    echo "</nav>\n";
  }

  public function IsURLCurrentPage($url)
  {
    if(strpos($_SERVER['PHP_SELF'],$url)===false)
    {
      return false;
    }
    else
    {
      return true;
    }
  }

  public function DisplayButton($name,$url,$active=true)
  {
    if ($active) { ?>
      <div class="menuitem">
        <a href="<?=$url?>">
        <span class="menutext"><?=$name?></span>
        </a>
      </div>
      <?php
    } else { ?>
      <div class="menuitem">
      <span class="menutext"><?=$name?></span>
      </div>
      <?php
    }  
  }

  public function DisplayFooter()
  {
    ?>
    <!-- page footer -->
    <footer>
      <p>&copy; Paige's Test 1</p>
    </footer>
    <?php
  }
}
?>

