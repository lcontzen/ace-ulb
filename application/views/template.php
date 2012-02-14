<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>Association des Cercles Etudiants</title>
    <meta name="description" content="">
    <meta name="author" content="">
	
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	
    <!-- Le styles -->
	<?php echo HTML::style("public/theme/css/style.css"); ?>
	<?php echo HTML::style("public/theme/css/prettify.css"); ?>
    <style type="text/css">
	  body {
		  padding-top: 60px;
	  }
	</style>
	<?php echo HTML::script("public/theme/js/jquery-1.5.2.min.js"); ?>
	<?php echo HTML::script("public/theme/js/prettify.js"); ?>
    <script>$(function () { prettyPrint() })</script>
	<?php echo HTML::script("public/theme/js/bootstrap-dropdown.js"); ?>
	<?php echo HTML::script("public/theme/js/application.js"); ?>
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
			<li><?php echo HTML::anchor("page/listesace", "Listes ACE"); ?></a></li>
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
		</div>
	  </div> 
	  <div class="content">
		<div class="row">		  
		  <div class="span16" id="content">
			<?php
			  echo $content ;
			?>
			
			<footer>
			  <p>&copy; Association des Cercles Etudiants 2011-2012 | Contact : webmaster@ace-ulb.org</p>
			</footer>
		  </div>
		</div>

	  </div> <!-- /container -->
	  
	</div>
  </body>
</html>
