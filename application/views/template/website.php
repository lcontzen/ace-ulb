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
			<?php echo HTML::anchor("page/index", "Association des Cercles Etudiants", array("class" => "brand")); ?>
			<ul class="nav">
              <li><?php echo HTML::anchor("page/index", "Home"); ?></li>
              <li><?php echo HTML::anchor("page/comite", "Comité"); ?></li>
              <li><?php echo HTML::anchor("page/photos", "Photos"); ?></li>
              <li><?php echo HTML::anchor("page/contact", "Contact"); ?></li>
			</ul>
          </div>
		</div>
      </div> 
	</div>
	
	<div class="container-fluid">
	  <div class="sidebar">
		<div class="well">
		  <b>Documents</b>
		  <ul>
			<li><?php echo HTML::anchor("page/listesace", "Listes ACE"); ?></li>
			<li><?php echo HTML::anchor("page/vlecks", "Listes Vlecks"); ?></li>
			<li><?php echo HTML::anchor("page/heresie", "Hérésie"); ?></li>
		  </ul>
		  <b>Agenda</b>
		  <ul>
			<li><?php echo HTML::anchor("page/tds", "TDs"); ?></li>
			<li><?php echo HTML::anchor("page/bals", "Bals"); ?></li>
		  </ul>
		  <b>Activités</b>
		  <ul>
			<li><?php echo HTML::anchor("page/quetesociale", "Quête Sociale"); ?></li>
			<li><?php echo HTML::anchor("page/ntv", "Nuit Théodore Verhaegen"); ?></li>
		  </ul> 
		  <b>Divers</b>
		  <ul>
			<li><?php echo HTML::anchor("page/links", "Liens"); ?></li>
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