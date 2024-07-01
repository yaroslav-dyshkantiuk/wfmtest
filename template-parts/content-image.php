<div class="col-12">
    <div <?php post_class('card shadow-sm wfmtest-format-image'); ?>>
        
        <?php echo wfmtest_post_thumb(get_the_ID()); ?>

        <div class="card-body">
            <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        </div>
    </div>
</div>