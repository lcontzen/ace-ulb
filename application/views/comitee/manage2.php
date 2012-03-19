<div class="page-header">
  <h1>Gestion de la liste <?php echo $cercle->name; ?></h1>
</div>
<table>
  <thead>
	<tr>
	  <th>Poste</th>
	  <th>Nom</th>
	  <th>Prénom</th>
	  <th>Photo</th>
	  <th></th>
	</tr>
  </thead>
  <tbody>
	<?php
	  foreach($comitee_members as $member) {
		echo '<tr>';
		echo '<td><b>' . $member->function . '</b></td>';
		echo '<td>' . $member->last_name. '</td>';
		echo '<td>' . $member->first_name . '</td>';
		echo '<td><img src="'.dirname(__FILE__).'/../../../'.$member->picture_link.'"/></td>';
		echo '</tr>';
	  }
	  ?>
  </tbody>
</table>
