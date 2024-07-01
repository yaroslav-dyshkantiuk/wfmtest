<?php
/*
Template Name: Sidebar on the left
Template Post Type: page
*/
?>
<?php get_header() ?>

<main>

	<div class="album py-5">
		<div class="container">

			<div class="row">

				<?php get_sidebar() ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<div class="col">
						<div class="card shadow-sm">

							<?php echo wfmtest_post_thumb( get_the_ID(), 'full', 'card-full-thumb' ) ?>

							<div class="card-body">
								<h1 class="card-title"><?php the_title(); ?></h1>
								<div class="card-text"><?php the_content( '' ); ?></div>
							</div>
						</div>
					</div>

				<?php endwhile; ?>

			</div>
		</div>
	</div>

</main>

<?php get_footer() ?>


