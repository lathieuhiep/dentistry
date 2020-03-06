<div class="site-post-content">
    <?php dentistry_post_formats(); ?>

    <div class="entry-meta">
        <span class="post-day">
            <?php echo get_the_date( 'd' ); ?>
        </span>

        <span class="post-my">
            / <?php echo get_the_date( 'M, Y' ); ?>
        </span>
    </div>

    <h2 class="site-post-title">
        <a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
            <?php if ( is_sticky() && is_home() ) : ?>
                <i class="fa fa-thumb-tack" aria-hidden="true"></i>
            <?php
            endif;

            the_title();
            ?>
        </a>
    </h2>

    <div class="site-post-excerpt">
        <p>
            <?php
            if ( has_excerpt() ) :
                echo esc_html( get_the_excerpt() );
            else:
                echo wp_trim_words( get_the_content(), 30, '...' );
            endif;
            ?>
        </p>

        <?php dentistry_link_page(); ?>
    </div>

    <div class="entry-bottom d-flex align-items-center justify-content-between">
        <div class="comment">
            <?php comments_popup_link( '0','1', '%' ); ?>
            <i class="fas fa-comments"></i>
        </div>

        <a class="read-more" href="<?php the_permalink(); ?>">
            <?php esc_html_e( 'Xem thêm', 'dentistry' ); ?>
            <i class="fas fa-arrow-alt-circle-right"></i>
        </a>
    </div>
</div>