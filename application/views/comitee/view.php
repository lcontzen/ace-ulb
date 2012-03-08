<div class="page-header">
  <h1>Comité <?php echo $comitee_name; ?></h1>
</div>
<table>
  <tbody>
	<?php
	  $count = count($comitee_members);
	  for ($i = 0; $i < $count; $i++) {
		echo '<tr>';
		echo '<td> <h3>' . $comitee_members[$i]->function . '</h3><br />';
		echo HTML::image($comitee_members[$i]->picture_link) . '<br />';
		echo $comitee_members[$i]->first_name . ' ' . $comitee_members[$i]->last_name . '</td>';
		$i = $i+1;
		if ($i < $count) {
		  echo '<td> <h3>' . $comitee_members[$i]->function . '</h3><br />';
		  echo HTML::image($comitee_members[$i]->picture_link) . '<br />';
		  echo $comitee_members[$i]->first_name . ' ' . $comitee_members[$i]->last_name . '</td>';
		}
		$i = $i+1;
		if ($i < $count) {
		  echo '<td> <h3>' . $comitee_members[$i]->function . '</h3><br />';
		  echo HTML::image($comitee_members[$i]->picture_link) . '<br />';
		  echo $comitee_members[$i]->first_name . ' ' . $comitee_members[$i]->last_name . '</td>';
		  echo '</tr>';
		}
	  }
	  /* foreach($comitee_members as $member) { */
	  /* 	echo HTML::image($member->picture_link); */
	  /* 	echo '<br />'; */
	  /* } */
	?>
  </tbody>
</table>
