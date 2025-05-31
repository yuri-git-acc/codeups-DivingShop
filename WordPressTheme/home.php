<?php get_header() ?>

<?php get_template_part('template-parts/fv'); ?>

<main>
    <!-- blog --------------------------------- -->
    <div class="blog layout-blog sub-page-fish">
        <div class="blog__inner inner">
            <div class="blog__contents">
                <div class="blog__main">
                    <?php if (have_posts()) : ?>
                        <div class="blog__cards blog-cards blog-cards--blog">
                            <?php while (have_posts()) : the_post(); ?>
                                <a href="<?php the_permalink(); ?>" class="blog-cards__item blog-card blog-card--blog">
                                    <div class="blog-card__img
                                ">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('full', ['class' => 'news__img']); ?>
                                        <?php else : ?>
                                            <img src="<?php echo esc_url(get_theme_file_uri("./assets/images/common/20200501_noimage.jpg")); ?>" alt="NoImage画像" />
                                        <?php endif; ?>
                                    </div>
                                    <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="blog-card__time"><?php echo get_the_date('Y.m.d'); ?></time>
                                    <p class="blog-card__title"><?php the_title(); ?></p>
                                    <div class="blog-card__text"><?php the_excerpt(); ?>
                                    </div>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        <p>記事が投稿されていません</p>
                    <?php endif; ?>
                    <div class="blog__pagination blog__pagination--blog">
                        <?php if (function_exists('wp_pagenavi')): ?>
                            <?php wp_pagenavi(); ?>
                        <?php endif; ?>
                    </div>

                </div>
                <?php get_template_part('template-parts/sidebar-blog'); ?>
            </div>

        </div>
    </div>
</main>

<?php get_template_part('template-parts/contact'); ?>
<?php get_footer(); ?>