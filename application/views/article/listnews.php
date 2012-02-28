<div class="page-header">
  <h1>Manage News</h1>
</div>
<div class="row">
  <div class="span5">
	<ul>
	<?php
   		echo '<li>'.HTML::anchor('article/addnews', 'Add news').'</li>';
   		foreach($news as $news_item) {
		  echo '<li>'.$news_item->title.'</li>';
		} ?>
	</ul>
  </div>
  <div class="span3">
	<?php
	  echo '<br />';
	  foreach($news as $news_item) {
		echo HTML::anchor('article/editnews/'.$news_item->slug, ' Edit') . '<br />';
	  } ?>
  </div>
</div>
