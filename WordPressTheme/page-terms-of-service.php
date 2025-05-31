<?php get_header() ?>
<?php get_template_part('template-parts/fv'); ?>

<main>
    <!-- Terms --------------------------------- -->
    <div class="terms layout-terms sub-page-fish">
        <div class="terms__inner inner">
            <div class="terms__rule rule">
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