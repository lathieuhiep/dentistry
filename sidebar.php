<?php if( is_active_sidebar( 'dentistry-sidebar-main' ) ): ?>

    <aside class="<?php echo esc_attr( dentistry_col_sidebar() ); ?> site-sidebar order-1">
        <?php dynamic_sidebar( 'dentistry-sidebar-main' ); ?>
    </aside>

<?php endif; ?>