<div class="page-header">
  <h1>Comité <?php echo $comitee_name; ?></h1>
</div>
<?php
foreach($comitee_members as $member) {
  echo HTML::image($member->picture_link);
  echo '<br />';
}