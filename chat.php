

      <?php

  
include('db.php');

   	$query=	"SELECT *FROM chat ORDER BY id DESC";
    $run= $conn->query($query);

    while ($row =$run->fetch()):
    	# code...
    
   	?>
 
      <div class="chat friend">
    <div class="user-photo"> <span style="color:green;"><?php echo $row['user'];?></span></div>
      <p class="chat-message"><span style="color:white;"><?php echo $row['msg'];?></span></p>


     <span style="float:right;"><?php echo formatDate($row['date']);?></span>
   	 </div>
   	<?php endwhile;?>
