<h1>Comité <?php echo strtoupper($comitee_name); ?></h1>
<div align="center">
  <table border="1">
	<tr>
  	  <?php
   		$i = 0;
		foreach ($comitee_members as $member) {
		  if ($i > 0 && $i%3 == 0) {
			echo '</tr>';
			echo '<tr>';
		  }
		  echo '<td>';
		  echo "<h3>".$member->function.'</h3>';
		  echo '<p><br /><img src="'.dirname(__FILE__).'/../../../'.$member->picture_link.'" height="170"/></p>';
		  echo '<p><b>'.$member->first_name.' '.$member->last_name.'</b></p>';
		  echo "</td>";
		  $i = $i+1;
		}
	  ?>
	</tr>
  </table>
</div>
