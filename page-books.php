<?php get_header() ?>

<main>

	<div class="album py-5">
		<div class="container">

			<div class="row">

				<?php while ( have_posts() ) : the_post(); ?>

					<div class="col">
						<div class="card shadow-sm">


							<div class="card-body">
								<h1 class="card-title"><?php the_title(); ?></h1>
								<div class="card-text"><?php the_content( '' ); ?></div>
							</div>
						</div>

						<div class="row g-3">
							<?php
								$books = new WP_Query(array(
									'post_type' => 'book',
									'posts_per_page' => 2,
									'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
								));
							?>

							<?php if($books->have_posts()) : while ( $books->have_posts() ) : $books->the_post(); ?>
								<?php get_template_part('template-parts/content'); ?>
							<?php endwhile; ?>
							<?php echo paginate_links(array(
								'type' => 'list',
								'current' => max(1, get_query_var('paged')),
								'total' => $books->max_num_pages,
							)); ?>
							<?php wp_reset_postdata(); ?>
							<?php else: ?>
								No posts found
							<?php endif; ?>

						</div>

					</div>

				<?php endwhile; ?>

                <?php get_sidebar() ?>

			</div>
		</div>
	</div>

</main>

<?php get_footer() ?>


