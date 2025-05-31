<?php get_header() ?>
<?php get_template_part('template-parts/fv'); ?>

<main>
    <!-- Privacy Policy --------------------------------- -->
    <div class="policy layout-policy sub-page-fish">
        <div class="policy__inner inner">
            <div class="policy__rule rule">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
</main>

<?php get_template_part('template-parts/contact'); ?>
<?php get_footer(); ?>