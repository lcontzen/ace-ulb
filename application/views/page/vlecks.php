<div class="page-header">
  <h1>Listes Vlecks</h1>
</div>
<h3>Toutes les listes</h3>
<?php
   if($zip_created)
	 echo HTML::file_anchor('public/listes/vlecks/listesvlecks.zip', 'Télécharger', array('class' => 'btn'));
   else
	 echo "<p>Le fichier n'a pas pu être généré<br /></p>";
?>
<h3>Listes par Cercle</h3>
<div class="row">
  <?php
   	$count = count($lists);
	for ($i = 0; $i < 3; $i++) {
  ?>
	 <div class="span5">
	   <ul>
		 <?php
	  	   for ($j = ($i *9); $j < ($i + 1)*9 && $j < $count; $j++) {
		 ?>
		 						   <li>
									 <?php echo HTML::file_anchor('public/listes/vlecks/'.$lists[$j], $names[$j]);	?>
								   </li>
								   <?php
		   							 }
								   ?>
	   </ul>
	 </div>
	 <?php
	   }
	 ?>
</div>
