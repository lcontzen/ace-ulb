<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="author" content="">
		<?php foreach ($styles as $file => $type) echo HTML::style($file, array('media' => $type)), PHP_EOL ?>
	<?php foreach ($scripts as $file) echo HTML::script($file), PHP_EOL ?>
  </head>
  <body>	
	  <div class="content">
		<div class="row">		  
		  <div class="span16" id="content">
			<?php echo $content; ?>
			
		  </div>
		</div>
		
	  </div> <!-- /container -->
	  
	</div>
  </body>
</html>
