<div class="col-12">
    <div class="card shadow-sm">
        
        <?php echo wfmtest_post_thumb(get_the_ID(), 'full', 'card-full-thumb'); ?>

        <div class="card-body">
        <h1 class="card-title"><?php the_title(); ?></h1>
        <div class="card-text"><?php the_content(); ?></div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="text-muted">
                <small>
                    <?php echo wfmtest_get_human_time_diff(); ?>
                </small><br>
                <small>
                    <?php the_tags(); ?>
                </small><br>
                <small>Category: 
                    <?php the_category(', '); ?>
                </small><br>
            </div>
        </div>
        </div>
    </div>
</div>