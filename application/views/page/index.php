<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="row">
  <div class="span3">
	<p><?php echo HTML::image('public/images/logoACE.jpg', array('height' => '150', 'alt' => "Logo ACE")); ?></p>
  </div>
  <div class="span13">
	<h2>Bienvenue sur le site de l'Association des Cercles Etudiants de l'ULB</h2>
  </div>
</div>
<hr>
<h2>Dernières nouvelles :</h2>
<!-- <div class="row"> -->
<!--   <div class="span6"> -->
<!-- 	<h3>TD Coopération le 29/02/2012</h3> -->
<!-- 	<?php echo HTML::file_anchor('public/images/AfficheCooperation2012.jpg', HTML::image('public/images/AfficheCooperation2012Small.jpg', array('height' => '150', 'alt' => "Affiche TD Cooperation 2012"))); ?> -->
<!-- 	<p>A l'occasion de la <?php echo HTML::anchor('http://www.ulb.ac.be/international/Evenements-Journee-Cooperation.html', 'Journée de la Coopération'); ?>, l'Association des Cercles Etudiants organise ce mercredi 29/02/2012 le désormais traditionnel TD Coopération dont les bénéfices seront entièrement reversés à une association caritative. Cette année, ils seront reversés à une association active dans l'aide aux enfants des rues au Maghreb.</p> -->
<!--   </div> -->
<!--   <div class="span5"> -->
<!-- 	<h3>Nuit T. Verhaegen 2011</h3> -->
<!-- 	<?php echo HTML::anchor('page/ntv', HTML::image('public/images/ntv11.jpg', array('height' => '150', 'alt' => "Affiche NTV 2011"))); ?> -->
<!-- 	<p> L Association des Cercles Etudiants, le Cercle du Libre-Examen, l'Union des Anciens Etudiants et l'Ordre Théodore Verhaegen ont le plaisir de vous convier à sa NUIT THEODORE VERHAEGEN dans le cadre superbement restauré de l'ARSENAL d'Etterbeek ! </p> -->
<!-- 	<p><?php echo HTML::anchor('page/ntv', 'Page du bal &raquo;', array('class' => 'btn')); ?></p> -->
<!--   </div> -->
<!--   <div class="span5"> -->
<!--   	<h3>Quête sociale</h3> -->
<!--   	<?php echo HTML::anchor('page/quetesociale', HTML::image('public/images/cap48.jpg', array('height' => '150', 'alt' => "Logo Cap48"))); ?> -->
<!--   	<p>Depuis de nombreuses années, à l'approche de la Saint-V, les étudiants fraîchement baptisés partent à l'assaut des passants et automobilistes pour solliciter quelques oboles. L'origine de cette tradition est très lointaine et incertaine. Mais lorsque nous retraçons l'histoire de la Saint-V...</p> -->
<!--   	<p><?php echo HTML::anchor('page/quetesociale', 'En savoir plus &raquo;', array('class' => 'btn')); ?></p> -->
<!--   </div> -->
  <!-- <div class="span5"> -->
  <!-- 	<h3>Hérésie n°2</h3> -->
  <!-- 	<?php echo HTML::anchor('pages/heresie', HTML::image('public/images/heresie2.jpg', array('height' => '150', 'alt' => "Hérésie 2"))); ?> -->
  <!-- 	<p>Le second numéro de l'Hérésie, le journal des Cercle Etudiants de l'ULB, est désormais disponible. Bonne lecture!</p> -->
  <!-- 	<p><?php echo HTML::anchor('page/heresie', "Page de l'Hérésie &raquo;", array('class' => 'btn')); ?></p> -->
  <!-- </div> -->
<!-- </div> -->
<div class="row">
  <div class="span6">
	<h3><?php echo $news[0]->title; ?></h3>
	<?php eval('?>'.$news[0]->body); ?>
  </div>
    <div class="span5">
	<h3><?php echo $news[1]->title; ?></h3>
	<?php eval('?>'.$news[1]->body); ?>
  </div>  <div class="span5">
	<h3><?php echo $news[2]->title; ?></h3>
	<?php eval('?>'.$news[2]->body); ?>
  </div>
</div>
