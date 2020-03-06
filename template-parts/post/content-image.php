<?php if ( has_post_thumbnail() ) :?>

    <div class="site-post-image">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_post_thumbnail('full'); ?>
        </a>
    </div>

<?php endif; ?>