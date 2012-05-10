<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="author" content="">
	<?php foreach ($styles as $file => $type) echo HTML::style($file, array('media' => $type)), PHP_EOL ?>
	<?php foreach ($scripts as $file) echo HTML::script($file), PHP_EOL ?>
	<style type="text/css">
	  body {
		  padding-top: 60px;
	  }
	</style>
  </head>
  <body>
	
    <div class="topbar-wrapper" style="z-index: 5;">
	  <div class="topbar" data-dropdown="dropdown">
		<div class="topbar-inner">
          <div class="container">
			<?php echo HTML::anchor("page/view/index", "Association des Cercles Etudiants", array("class" => "brand")); ?>
			<ul class="nav">
              <li><?php echo HTML::anchor("page/view/index", "Home"); ?></li>
              <li><?php echo HTML::anchor("page/view/comite", "Comité"); ?></li>
              <li><?php echo HTML::anchor("page/view/photos", "Photos"); ?></li>
              <li><?php echo HTML::anchor("page/view/contact", "Contact"); ?></li>
			</ul>
			<?php if (isset($dropdownmenu)) {
			  echo $dropdownmenu;
			  } else {?>
			<ul class="nav secondary-nav">
			  <li><?php	echo HTML::anchor('user/login', 'Login');?></li>
			</ul>
			<?php } ?>
          </div>
		</div>
      </div> 
	</div>
	
	<div class="container-fluid">
	  <div class="sidebar">
		<div class="well">
		  <b>Documents</b>
		  <ul>
			<?php /* <li><?php echo HTML::anchor("page/view/listesace", "Listes ACE"); ?></li> */ ?>
			<li><?php echo HTML::file_anchor('public/listes/ListesACE.pdf', 'Listes ACE'); ?></li>
			<li><?php echo HTML::anchor("page/view/vlecks", "Listes Vlecks"); ?></li>
			<li><?php echo HTML::anchor("page/view/heresie", "Hérésie"); ?></li>
			<li><?php echo HTML::file_anchor("docs/CHARTE_HORAIRE_12-13.pdf", "Charte Horaire 2012-2013"); ?></li>
			<li><?php echo HTML::file_anchor("docs/VADE-MECUM-2011-2012.pdf", "Vade Mecum 2011-2012"); ?></li>
		  </ul>
		  <b>Agenda</b>
		  <ul>
			<li><?php echo HTML::anchor("page/view/tds", "TDs"); ?></li>
			<li><?php echo HTML::anchor("page/view/bals", "Bals"); ?></li>
		  </ul>
		  <b>Activités</b>
		  <ul>
			<li><?php echo HTML::anchor("page/view/quetesociale", "Quête Sociale"); ?></li>
			<li><?php echo HTML::anchor("page/view/ntv", "Nuit Théodore Verhaegen"); ?></li>
			<li><?php echo HTML::anchor("page/view/CAB2012", "Cantus Auguste Baron"); ?></li>
		  </ul> 
		  <b>Divers</b>
		  <ul>
			<li><?php echo HTML::anchor("page/view/links", "Liens"); ?></li>
		  </ul>
		  <a href="https://twitter.com/ace_ulb" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @ace_ulb</a>
		  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
	  </div> 
	  <div class="content">
		<div class="row">		  
		  <div class="span16" id="content">
			<?php echo $content; ?>
			
			<footer>
			  <p>&copy; Association des Cercles Etudiants 2011-2012 | Contact : <?php echo HTML::mailto('webmaster@ace-ulb.be'); ?></p>
			</footer>
		  </div>
		</div>
		
	  </div> <!-- /container -->
	  
	</div>
  </body>
</html>
