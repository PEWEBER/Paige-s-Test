<?php
    require("page.php");
    $vieworderspage = new Page();
    $vieworderspage->content = "<!-- page content -->
    <section>
    <h2>Customer Orders</h2> 
    </section>";
    $vieworderspage->Display();
      //Read in the entire file
      //Each order becomes an element in the array
      $orders= file("info.txt");
    
      // count the number of orders in the array
      $number_of_orders = count($orders);
    
      if ($number_of_orders == 0) {
        echo "<p><strong>No orders pending.<br />
              Please try again later.</strong></p>";
      }
    
      echo "<table>\n";
      echo "<tr>
    <th style=\"padding: 10px;\">First Name </th>
              <th style=\"padding: 10px;\">Last Name</th>
              <th style=\"padding: 10px;\">Age</th>
            <tr>";
    
      for ($i=0; $i<$number_of_orders; $i++) {
        //split up each line
        $line = explode("\t", $orders[$i]);
    
        // keep only the number of items ordered
        // $line[1] = intval($line[1]);
        // $line[2] = intval($line[2]);
        // $line[3] = intval($line[3]);
    
        // output each order
        echo "<tr>
              <td style=\"text-align: center;\">".$line[0]."</td>
              <td style=\"text-align: center;\">".$line[1]."</td>
              <td style=\"text-align: center;\">".$line[2]."</td>
          </tr>";
          $totalsum = $line[2] + $totalsum;
      }    
      echo "</table>";
    echo "</br>";
    echo "Total: ".$totalsum;
    ?>
