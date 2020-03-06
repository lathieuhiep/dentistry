<?php if(function_exists('bcn_display')) : ?>

	<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
		<div class="container text-center">
            <div class="breadcrumbs-col">
                <h1 class="woocommerce-products-header__title page-title">
                    <?php
                    if ( is_archive() ) :
                        the_archive_title();
                    else:
                        the_title();
                    endif;
                    ?>
                </h1>

                <div class="breadcrumbs-box">
                    <?php bcn_display(); ?>
                </div>
            </div>
		</div>
	</div>

<?php endif; ?>