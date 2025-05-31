<?php get_header() ?>
<?php get_template_part('template-parts/fv'); ?>

<main>
    <!-- single --------------------------------- -->
    <div class="blog layout-single sub-page-fish">
        <div class="blog__inner inner">
            <div class="blog__contents blog__contents--single">
                <div class="blog__single">
                    <div class="single">
                        <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="single__time"><?php echo get_the_date('Y.m.d'); ?></time>
                        <h2 class="single__title"><?php the_title(); ?></h2>
                        <div class="single__img">
                            <?php the_post_thumbnail('full'); ?>
                        </div>
                        <div class="single__content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="blog__pagination blog__pagination--single">
                        <div class="wp-pagenavi">
                            <?php
                            // 前の記事へのリンク
                            $prev_link = get_previous_post_link('%link', '');
                            echo str_replace('<a href=', '<a class="pagenavi__prev" href=', $prev_link);

                            // 次の記事へのリンク
                            $next_link = get_next_post_link('%link', '');
                            echo str_replace('<a href=', '<a class="pagenavi__next" href=', $next_link);
                            ?>

                        </div>
                    </div>
                </div>
                <?php get_template_part('template-parts/sidebar-blog'); ?>

            </div>
        </div>
    </div>
</main>

<?php get_template_part('template-parts/contact'); ?>
<?php get_footer(); ?>