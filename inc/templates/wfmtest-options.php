<div class="wrap">
	<h1>Theme Options Home Page</h1>

    <form action="options.php" method="post">

        <?php settings_fields( 'wfmtest_general_group' ); ?>

        <?php do_settings_sections( 'wfmtest-options' ); ?>

        <?php submit_button(); ?>

    </form>
    
</div>
