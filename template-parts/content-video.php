<div class="col-12">
    <div <?php post_class('card shadow-sm wfmtest-format-video'); ?>>

        <div class="ratio ratio-16x9">
            <?php 
            echo wfmtest_get_media(array('iframe', 'video')); 
            ?>
        </div>
        <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
    </div>
</div>