<div class="col-12">
    <div <?php post_class('card shadow-sm'); ?>>
        
        <?php echo wfmtest_post_thumb(get_the_ID()); ?>

        <div class="card-body">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <div class="card-text"><?php the_excerpt(); ?></div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
            <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-secondary"><?php echo __('Read more', 'wfmtest'); ?></a>
            </div>
            <small class="text-muted">
                <?php echo wfmtest_get_human_time_diff(); ?>
            </small>
        </div>
        </div>
    </div>
</div>