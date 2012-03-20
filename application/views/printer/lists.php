<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 12pt">
	<page_header>
		<table class="page_header">
			<tr>
				<td style="width: 100%; text-align: left">
				  Listes ACE 2011-2012 - Dernière mise à jour : <?php echo date("d/m/y"); ?>
				</td>
			</tr>
		</table>
	</page_header>
	<page_footer>
		<table class="page_footer">
			<tr>
				<td style="width: 100%; text-align: right">
					page [[page_cu]]/[[page_nb]]
				</td>
			</tr>
		</table>
	</page_footer>
	<h1>Listes ACE 2011-2012</h1>
	<div class="standard">
	  <?php echo $count; ?>
	</div>
</page>
<?php
   for ($i = 0; $i < $count; $i++) {
   ?>
<page pageset="old">
	<bookmark title="<?php echo $cercles[$i]['name']; ?>" level="0" ></bookmark><h1><?php echo $cercles[$i]['name']; ?></h1>
	<div class="standard">
	  <table border="1">
		<tr>
  		  <?php
   			$j = 0;
   			foreach ($cercles[$i]['comitee_members'] as $member) {
			  if ($j > 0 && $j%3 == 0) {
				echo '</tr>';
				echo '<tr>';
			  }
			  echo '<td style="text-align: center">';
			  echo "<h3>".$member->function.'</h3>';
			  if ($member->picture_link == null)
				echo '<p><img src="'.dirname(__FILE__).'/../../../public/pics/listes/null.png" height="170"/></p>';
			  else 
				echo '<p><img src="'.dirname(__FILE__).'/../../../'.$member->picture_link.'" height="170"/></p>';
			  echo '<p><b>'.$member->first_name.' '.$member->last_name.'</b></p>';
			  echo "</td>";
			  $j = $j+1;
			}
		  ?>
		</tr>
	  </table>

	</div>
</page>
<?php
   }
  ?>
