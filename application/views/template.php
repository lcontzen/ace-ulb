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
			<a class="brand" href="?action=home">Association des Cercles Etudiants</a>
			<ul class="nav">
              <li><a href="?action=home">Accueil</a></li>
              <li><a href="?action=comite">Comité</a></li>
              <li><a href="?action=photos">Photos</a></li>
              <li><a href="?action=contact">Contact</a></li>
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
			<li><a href="?action=listesace">Listes ACE</a></li>
			<li><a href="?action=vlecks">Listes Vlecks</a></li>
			<li><?php echo HTML::anchor("page/heresie", "Hérésie"); ?></li>
		  </ul>
		  <b>Agenda</b>
		  <ul>
			<li><a href="?action=tds">TDs</a></li>
			<li><a href="?action=bals">Bals</a></li>
		  </ul>
		  <b>Activités</b>
		  <ul>
			<li><a href="?action=quetesociale">Quête Sociale</a></li>
			<li><a href="?action=ntv">Nuit Théodore Verhaegen</a></li>
		  </ul> 
		  <b>Divers</b>
		  <ul>
			<li><a href="?action=links">Liens</a></li>
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
