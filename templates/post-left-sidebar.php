<?php
/*
Template Name: Sidebar on the left
Template Post Type: post, book
*/
?>
<?php get_header() ?>

<main>

    <div class="album py-5">
        <div class="container">

            <div class="row">

	            <?php get_sidebar(); ?>

                <div class="col">
                    <div class="row mb-3">
	                    <?php while ( have_posts() ) : the_post(); ?>

		                    <?php get_template_part( 'template-parts/single', get_post_format() ) ?>

	                    <?php endwhile; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

</main>

<?php get_footer() ?>

