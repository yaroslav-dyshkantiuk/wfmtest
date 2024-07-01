<?php get_header() ?>

<main>

    <div class="album py-5">
        <div class="container">

            <div class="row">

                <div class="col-12">
                    <h1>Search by request: <?php echo get_search_query(); ?></h1>
					<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
                </div>

                <div class="col">

                    <div class="row g-3">

						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'template-parts/content', get_post_format() ) ?>
						<?php endwhile; ?>

                            <div class="col-12">
								<?php the_posts_pagination( array(
									'show_all' => false,
									'end_size' => 2,
									'type'     => 'list',
								) ); ?>
                            </div>

						<?php else: ?>
                            <div class="card">
                                <p>Nothing found for your search</p>
                            </div>
						<?php endif; ?>

                    </div>
                </div>

                <?php get_sidebar(); ?>

            </div>
        </div>
    </div>

</main>

<?php get_footer() ?>
