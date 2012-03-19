<div class="page-header">
   <h1>Comité <?php echo strtoupper($comitee_name); ?></h1>
</div>

<div class="row" align="center">
  <div class="row">
	<?php
   	  $i = 0;
   	  foreach ($comitee_members as $member) {
		if ($i > 0 && $i%3 == 0) {
		  echo '</div>';
		  echo '<div class="row">';
		}
		echo '<div class="span5">';
		echo "<h3>".$member->function.'</h3>';
		echo '<p><img src="'.dirname(__FILE__).'/../../../'.$member->picture_link.'"/></p>';
		echo '<p><b>'.$member->first_name.' '.$member->last_name.'</b></p>';
		echo "</div>";
		$i = $i+1;
	  }
	?>
  </div>
</div>
