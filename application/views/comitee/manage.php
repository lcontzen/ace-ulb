<div class="page-header">
  <h1>Gestion de la liste <?php echo $cercle->name; ?></h1>
</div>
<table>
  <thead>
	<tr>
	  <th>Poste</th>
	  <th>Nom</th>
	  <th>Prénom</th>
	  <th>Numéro de GSM</th>
	  <th>Adresse email</th>
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
		echo '<td>' . $member->gsm_number . '</td>';
		echo '<td>' . $member->mail_address . '</td>';
		echo '<td>' . HTML::image($member->picture_link, array('alt' => $member->function, 'height' => '50')) . '</td>';
		echo '<td>' . HTML::anchor('comitee/editmember/'.$member->id, 'Editer') . '</td>';
		echo '</tr>';
	  }
	  ?>
  </tbody>
</table>
