<div class="page-header">
  <h1>Listes ACE 2011-2012</h1>
</div>

<h3>Liste complète</h3>
<p><?php
   $myurl = 'public/listes/ace/Listes ACE – 2011.docx';
  $myurl = str_replace(DOCROOT, '', $myurl);
  echo HTML::file_anchor('public/listes/ace/Listes ACE – 2011.docx', '<b>Download</b>', array('class' => 'btn'));
?></p>

<h3>Listes par Cercle</h3>
<div class="row" id="test">
<?php
   for ($i = 0; $i < 3; $i++) {
?>
	 <div class="span5">
	   <ul>
		 <?php
		   for ($j = ($i *10); $j < ($i + 1)*10; $j++) {
		 ?>
			<li><?php echo HTML::file_anchor('public/listes/ace/'.$lists[$j], $names[$j]); ?></li>
		<?php
		   }
		?>
	   </ul>
	 </div>
	 <?php
   	   }
	 ?>
</div>
