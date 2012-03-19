<style type="text/css">
<!--
    table.page_header {width: 100%; border: none; background-color: #eeeeee; border-bottom: solid 0.5mm #000000; padding: 2mm }
    table.page_footer {width: 100%; border: none; background-color: #eeeeee; border-top: solid 0.5mm #000000; padding: 2mm}
    table.info_header{width: 100%; border: none; border-top: solid 0.1mm #000000; font-size: 7pt;  border-bottom: 0.6mm solid #000000;}
    table.conteudo{width: 100%;}
    
    
    table.conteudo{font-weight:normal; font-size:7pt;}
    table.conteudo th{font-weight:normal; border:0.2mm solid #000000;}
    table.conteudo td{font-weight:normal; border-bottom:0.1mm solid #dddddd; font-size:07pt; padding-right:20mm;}
    table.conteudo .titulo{background-color: #F6F6F6;}
    table.conteudo .titulo h2{font-size:9pt;}

-->
</style>


<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 9pt">

  <page_footer>
	<table class="page_footer">
            <tr>
                <td style="width: 100%; text-align: right">
                    page [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
  </page_footer>
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
</page>
