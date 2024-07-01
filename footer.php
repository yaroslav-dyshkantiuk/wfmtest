<footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Back to top</a>
        </p>
        <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>

		<?php $phone = get_theme_mod( 'wfmtest_phone' ); ?>

        <p class="mb-1 phone" <?php if (!$phone) echo " style=display:none; " ?>>Phone: <span><?php echo $phone; ?></span></p>
        <p>Email: <?php echo esc_attr(get_option('wfmtest_email', '-')); ?></p>
        <p>Email: <?php echo esc_attr(get_option('wfmtest_facebook', '-')); ?></p>

        <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a
                    href="/docs/5.1/getting-started/introduction/">getting started guide</a>.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
