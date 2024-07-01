<?php
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="col-md-3 sidebar">
	<?php dynamic_sidebar( 'sidebar-1' ) ?>
</div>
