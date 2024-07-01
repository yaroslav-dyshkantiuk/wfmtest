<?php get_header() ?>

<main>

    <div class="album py-5">
        <div class="container">

            <div class="row">

                <div class="col">
                    <div class="row mb-3">
	                    <?php while ( have_posts() ) : the_post(); ?>

		                    <?php get_template_part( 'template-parts/single', get_post_format() ) ?>

	                    <?php endwhile; ?>
                    </div>
                </div>

				<?php get_sidebar(); ?>

            </div>
        </div>
    </div>

</main>

<?php get_footer() ?>

