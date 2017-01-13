<?php
$founded=get_post_meta($post->ID,'_projects_founded',true);
$pointers=get_post_meta($post->ID,'_projects_pointers',true);
$support=get_post_meta($post->ID,'_projects_support',true);
$abbr=get_post_meta($post->ID,'_projects_abbr',true);
?>
<style>
.pform th {
	padding-right:5px;
	text-align:right;
}
</style>
<table class="pform">
<tr><th>Founded:</th><td><input type="text" name="_projects[founded]" value="<?php echo htmlq($founded); ?>"/></td></tr>
<tr><th>Map Pointers:<br/><small>(numbers comma separated)</small></th><td><input type="text" name="_projects[pointers]" value="<?php echo htmlq($pointers); ?>"/></td></tr>
<tr><th>We Support:</th><td><textarea name="_projects[support]" cols="70" rows="5"><?php echo html($support); ?></textarea></td></tr>
<tr><th>Abbreviation:</th><td><input type="text" name="_projects[abbr]" value="<?php echo htmlq($abbr); ?>"/></td></tr>
</table>