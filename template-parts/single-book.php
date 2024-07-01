<div class="col-12">
    <div class="card shadow-sm">
        
        <?php echo wfmtest_post_thumb(get_the_ID(), 'full', 'card-full-thumb'); ?>

        <div class="card-body">
        <h1 class="card-title"><?php the_title(); ?></h1>

        <?php update_post_meta(get_the_ID(), 'book_price', 30); ?>
        <?php echo wfmtest_get_book_pages(get_the_ID()); ?>
        <?php echo wfmtest_get_book_cover(get_the_ID()); ?>

        <?php echo wfmtest_get_price(get_the_ID()); ?>
        <div class="card-text"><?php the_content(); ?></div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="text-muted">
                <small>
                    <?php echo wfmtest_get_human_time_diff(); ?>
                </small><br>
            </div>
        </div>
        </div>
    </div>
</div>